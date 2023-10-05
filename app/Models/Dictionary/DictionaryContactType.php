<?php

namespace App\Models\Dictionary;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DictionaryContactType extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'can_edit', 'can_remove', 'category_id', 'code', 'name_lang', 'icon'
    ];

    public const CODE_PREFIX = "contact_type_";


    /**
     * relation: category
     *
     * @return DictionaryContactCategory
     */
    public function category()
    {
        return $this->hasOne(DictionaryContactCategory::class, 'id', 'category_id');
    }

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
    public function GenerateNameLang()
    {
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
    public function UpdateIcon($icon)
    {
        $this->icon = $icon;
        $this->save();
    }

    /**
     * update category
     *
     * @param int $category_id
     * @return void
     */
    public function UpdateCategory($category_id)
    {
        $this->category_id = $category_id;
        $this->save();
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
            case 'category_id':
                return DictionaryContactCategory::all();
                break;
            default:
                return array();
                break;
        }
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
}
