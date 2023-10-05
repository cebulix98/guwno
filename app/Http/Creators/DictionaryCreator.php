<?php

namespace App\Http\Creators;

use App\Http\Managers\DictionaryManager;
use App\Models\Dictionary\Dictionary;
use App\Models\Dictionary\Sections\DictionaryItemCategory;
use App\Models\Dictionary\Sections\DictionaryItemSection;
use App\Models\Dictionary\Sections\DictionaryItemSectionCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/** db model creator */
class DictionaryCreator
{
    /**
     * create dictionary word
     *
     * @param int $id
     * @param array $attributes request all
     * @return void
     */
    public static function CreateWord($id, $attributes)
    {
        $dictionary = Dictionary::find($id);
        $classname = DictionaryManager::GetClassName($dictionary->table_name);

        if ($classname != null && $dictionary != null) {
            $data = array();

            foreach ($dictionary->GetAttributesNames() as $attribute) {
                if (isset($attributes[$attribute]) && $attribute != 'id') {
                    $data[$attribute] = $attributes[$attribute];
                }
            }

            $models = DictionaryManager::CreateFactory($dictionary->table_name, $data);
            return $models;
        }
    }
}
