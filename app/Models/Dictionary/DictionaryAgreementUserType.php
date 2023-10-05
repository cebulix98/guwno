<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictionaryAgreementUserType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'agreement_id', 'can_edit', 'can_remove', 'is_required', 'is_active'
    ];

    /**
     * relation: agreement
     *
     * @return DictionaryAgreement
     */
    public function agreement()
    {
        return $this->hasOne(DictionaryAgreement::class, 'id', 'agreement_id');
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateName($name)
    {
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateAgreement($value)
    {
        $this->agreement_id = $value;
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
    public function CanBeEdited()
    {
        if ($this->can_edit) return true;

        return false;
    }

    /**
     * can model be removed
     *
     * @return boolean
     */
    public function CanBeRemoved()
    {
        if ($this->can_remove) return true;

        return false;
    }

    /**
     * get foreign key options
     *
     * @param string $attribute
     * @return array
     */
    public static function GetOptions($attribute)
    {
        switch ($attribute) {
            case 'agreement_id':
                return DictionaryAgreement::all();
                break;
            default:
                return array();
                break;
        }
    }
}
