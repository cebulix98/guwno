<?php

namespace App\Http\Controllers\Guest\Motion\View;

use App\Http\Controllers\Controller;
use App\Models\Dictionary\DictionaryWeb;
use App\Models\Motion\Motion;
use Illuminate\Http\Request;

class MotionFormThankYouController extends Controller
{
    /**
     * view name
     */
    public const VIEW = "subpages.motions.forms.motion_form_thankyou";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $motion = Motion::find($request->id);
        $origin = DictionaryWeb::find($request->origin);
        $link = url(route('motions.form.origin.code',['code'=>$motion->settings->custom_link,'origin'=>($origin)?$origin->id:0]));

        return $this->GetView($request, $origin, $motion, $link);
    }

    /**
     * get view
     *
     * @param * $models
     * @return void
     */
    public function GetView(Request $request, $origin, $motion, $link)
    {
        return view($this::VIEW, [
            'origin' => $origin,
            'motion' => $motion,
            'link' => $link
        ]);
    }
}
