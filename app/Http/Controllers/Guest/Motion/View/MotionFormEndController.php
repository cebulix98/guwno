<?php

namespace App\Http\Controllers\Guest\Motion\View;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use Illuminate\Http\Request;

class MotionFormEndController extends Controller
{
    /**
     * view name
     */
    public const VIEW = "subpages.motions.forms.motion_form_end";

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        return $this->GetView($request);
    }

    /**
     * get view
     *
     * @param * $models
     * @return void
     */
    public function GetView(Request $request)
    {
        $transaction = Order::find($request->transaction_id);

        return view($this::VIEW, [
            'transaction_id' => $request->transaction_id,
            'total_price' => $transaction->total_price_brutto
        ]);
    }
}
