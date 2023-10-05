<?php

namespace App\Http\Controllers\Guest\Motion\View;

use App\Http\Controllers\Controller;
use App\Models\Dictionary\DictionaryWeb;
use App\Models\Motion\Motion;
use App\Models\Motion\MotionPrice;
use Illuminate\Http\Request;

class MotionFormController extends Controller
{
    /**
     * view name
     */
    public const VIEW = "subpages.motions.forms.motion_form";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $motion_id = $request->id;
        $origin_id = $request->origin;
        $total_price = 9999;

        $motion = Motion::find($motion_id);
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
        return view($this::VIEW, [
            'motion_id' => $motion_id,
            'origin_id' => $origin_id,
            'total_price' => $total_price,
            'motion' => $motion
        ]);
    }
}
