<?php

namespace App\Http\Controllers\Prices\Manage;

use App\Http\Controllers\Controller;
use App\Models\Dictionary\DictionaryWeb;
use App\Models\Motion\Motion;
use App\Models\Motion\MotionPrice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MotionPricesManageController extends Controller
{
    /**
     * fill price list with items
     * check if MotionPrice models exist for this web, if not create them
     * 
     *
     * @param Request $request
     * @return void
     */
    public function FillPriceListWithMotions(Request $request) {
        try {
            $model = DictionaryWeb::find($request->id);
            if(!$model) throw new Exception();

            $model->CheckMotionPrices();

            request()->session()->flash('alert-success', __('messages.add_success'));
        } catch(Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        }

        return redirect()->back();
    }

    public function UpdatePrice(Request $request) {
        try {
            $model = MotionPrice::find($request->id);
            if(!$model) throw new Exception();

            $vat_rate = $request->vat_rate/100;

            $model->UpdateAll($request->single_price_brutto,$vat_rate);

            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch(Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }

    public function UpdateAllPrices(Request $request) {
        try {
            $model = DictionaryWeb::find($request->id);
            if(!$model) throw new Exception();

            $input_prefix_brutto = "single_price_brutto_";
            $input_prefix_vat = "vat_rate_";

            foreach($model->motion_prices as $price) {
                $brutto = $request->input($input_prefix_brutto.$price->id);
                $vat = $request->input($input_prefix_vat.$price->id);

                $vat_rate = $vat/100;
                $price->UpdateAll($brutto,$vat_rate);

            }

            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch(Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }
}
