<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictionaryAddressType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'can_edit', 'can_remove', 'code', 'name_lang'
    ];

    public const CODE_PREFIX = "address_type_";

    /**
     * generate code
     *
     * @return void
     */
    public function GenerateCode() {
        $code = $this::CODE_PREFIX.$this->id;
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
    public function UpdateName($name) {
        $this->name = $name;
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
