<?php

namespace App\Models\Dictionary;

use App\Http\Managers\DictionaryManager;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Dictionary extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'code', 'table_name', 'is_editable', 'is_visible', 'name_lang'
    ];

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
     * get dictionary models
     *
     * @return array
     */
    public function GetWords()
    {
        $all = DictionaryManager::GetAll($this->table_name);
        return ($all != null) ? $all : array();
    }

    /**
     * get column names
     *
     * @return array
     */
    public function GetAttributesNames()
    {
        return Schema::getColumnListing($this->table_name);
    }

    /**
     * dictionary has attribute
     *
     * @param string $attribute
     * @return boolean
     */
    public function HasAttributeName($attribute)
    {
        $attributes = $this->GetAttributesNames();
        if ($attributes == null) return false;

        foreach ($attributes as $attr) {
            if ($attr == $attribute) return true;
        }

        return false;
    }

    /**
     * get options for new word
     *
     * @param string $attribute
     * @return array
     */
    public function GetForeignKeyOptions($attribute)
    {
        return DictionaryManager::GetOptions($this->table_name, $attribute);
    }
}
