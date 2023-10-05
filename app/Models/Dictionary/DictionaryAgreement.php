<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictionaryAgreement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'can_edit', 'can_remove', 'is_required', 'is_active', 'code', 'name_lang'
    ];

    public const CODE_PREFIX = "agreement_";

    /**
     * generate code
     *
     * @return void
     */
    public function GenerateCode()
    {
        $code = $this::CODE_PREFIX . $this->id;
        $this->code = $code;
        $this->save();
    }

        /**
     * copy lang name as name
     *
     * @return void
     */
    public function GenerateNameLang() {
        $this->name_lang = $this->name;
        $this->save();
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateName($name)
    {
        $this->name = $name;
        $this->save();
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateDescription($name)
    {
        $this->description = $name;
        $this->save();
    }

    /**
     * toggle active
     *
     * @param boolean $toggle
     * @return void
     */
    public function ToggleIsRequired($toggle)
    {
        $this->is_required = $toggle;
        $this->save();
    }

    /**
     * can model be edited
     *
     * @return boolean
     */
    public function CanBeEdited() {
        if($this->can_edit) return true;

        return false;
    }

    /**
     * can model be removed
     *
     * @return boolean
     */
    public function CanBeRemoved() {
        if($this->can_remove) return true;

        return false;
    }
}
