<?php

namespace App\Http\Creators;

use App\Models\Motion\Motion;
use App\Models\Motion\MotionPrice;
use App\Models\Motion\MotionSetting;

/** db model creator */
class MotionCreator
{
    public static function CreateMotion($name, $code, $type_id)
    {
        $model = Motion::create([
            'name' => $name,
            'can_edit' => 1,
            'can_remove' => 0,
            'code' => $code,
            'name_lang' => $name,
            'type_id' => $type_id
        ]);

        return $model;
    }

    public static function CreateMotionPrice($motion_id, $origin_id, $vat_rate, $netto = 0)
    {
        $model = MotionPrice::create([
            'motion_id' => $motion_id,
            'origin_id' => $origin_id,
            'single_price_netto' => $netto,
            'vat_rate' => $vat_rate
        ]);

        $model->CalculateTotal();

        return $model;
    }

    public static function CreateMotionSetting($motion_id, $is_free, $has_attachement, $has_agreements)
    {
        $model = MotionSetting::create([
            'motion_id' => $motion_id,
            'is_free' => $is_free,
            'has_attachement' => $has_attachement,
            'has_agreements' => $has_agreements
        ]);

        return $model;
    }
}
