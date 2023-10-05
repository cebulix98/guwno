<?php

namespace App\Http\Controllers\Guest\Motion\View;

use App\Http\Controllers\Controller;
use App\Models\Motion\Motion;
use App\Models\Motion\MotionPrice;
use App\Models\Motion\MotionSetting;
use Illuminate\Http\Request;

class MotionCustomFormViewController extends Controller
{
    /**
     * view name
     */
    public const VIEW = "subpages.motions.forms.custom.custom_motion_form_";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $motion_id = $request->id;
        $motion = Motion::find($motion_id);

        if ($request->code) {
            $settings = MotionSetting::where('custom_link', $request->code)->first();
            if ($settings) {
                $motion = $settings->motion;
                $motion_id = $motion->id;
            }
        }

        $origin_id = $request->origin;
        $total_price = 9999;

        $price = MotionPrice::where('motion_id', $motion_id)->where('origin_id', $origin_id)->first();

        if ($price) $total_price = $price->total_price_brutto;

        return $this->GetView($motion_id, $origin_id, $total_price, $motion);
    }

    /**
     * get view
     *
     * @param * $models
     * @return void
     */
    public function GetView($motion_id, $origin_id, $total_price, $motion)
    {
        $view = $this::VIEW . $motion_id;
        return view($view, [
            'motion_id' => $motion_id,
            'origin_id' => $origin_id,
            'total_price' => $total_price,
            'motion' => $motion
        ]);
    }
}
