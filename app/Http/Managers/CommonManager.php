<?php

namespace App\Http\Managers;

use Illuminate\Support\Facades\Log;

//complex static classes
class CommonManager
{
    /**
     * is model in array
     *
     * @param int $model_id
     * @param array $selected
     * @return boolean
     */
    public static function IsModelSelected($model_id, $selected)
    {
        if (in_array($model_id, $selected)) return true;
    }

    /**
     * toggle model, create or delete
     *
     * @param int $model_id
     * @param array $request_ids
     * @param * $existing_model
     * @return boolean should be created
     */
    public static function ToggleModel($model_id, $request_ids, $existing_model)
    {
        if ($request_ids == null) $is_selected = false;
        else $is_selected = CommonManager::IsModelSelected($model_id, $request_ids);

        if ($is_selected) {
            return true;
        } else if ($existing_model != null) {
            $existing_model->delete();
        }

        return false;
    }
}
