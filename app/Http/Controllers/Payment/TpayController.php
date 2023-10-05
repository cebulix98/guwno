<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Http\Creators\OrderCreator;
use App\Http\Custom\TPay\TpayHandler;
use App\Http\Custom\TPay\TPayNotification;
use App\Models\Order\Order;
use App\Models\Order\OrderMaster;
use App\Models\Order\OrderTransaction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TpayController extends Controller
{
    public function Pay(Request $request)
    {
        $price = 10;
        $email = 'test@mail.com';
        $name = "test";

        $manager = new TpayHandler($price, $email, $name, 'Transakcja nr 1', route('test'), route('payment.tpay.result'), '1');
        $manager->Handle();
    }

    /**
     * pay for order
     *
     * @param Request $request
     * @return void
     */
    public function PayOrder(Request $request)
    {
        try {
            $result_url = route('payment.tpay.result');
            $transaction = OrderTransaction::find($request->transaction_id);
            $case = ($transaction->order) ? $transaction->order->case : null;
            $origin = ($case && $case->origin) ? $case->origin->id : null;
            $motion_id = ($case && $case->case_motion) ? $case->case_motion->id : 0;
            $target_url = route('motions.form.origin',['id'=>$motion_id,'origin'=>$origin]);

            if(!$transaction) throw new Exception();
            //create response
            $manager = new TpayHandler(
                $transaction->total_price_brutto,
                $transaction->payer_email,
                $transaction->payer_name,
                $transaction->title,
                $target_url,
                $result_url,
                $transaction->crc
            );

            //send response to tpay server
            $manager->Handle();
        } catch (Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.open_tpay_fail'));
            return redirect()->back();
        }
    }

    /**
     * receive tpay response 
     *
     * @param Request $request
     * @return void
     */
    public function Receive(Request $request)
    {
        try {
            $handler = new TPayNotification();
            //verify response
            $notification = $handler->getTpayNotification();
            //process response
            $transaction = $this->ProcessTransaction($notification);
            // $case = ($transaction->order) ? $transaction->order : null;
            // $origin = ($case && $case->origin) ? $case->origin->web : null;

            return true;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }

    /**
     * process tpay response
     *
     * @param array $notification
     * @return OrderTransaction
     */
    public function ProcessTransaction($notification)
    {
        try {
            //if transaction successfull
            if ($notification['tr_status']) {
                $crc = $notification['tr_crc'];
                Log::info('crc: '.$crc);
                //get transaction 
                $transaction = OrderTransaction::where('crc', '=', $crc)->first();

                if ($transaction) {
                    if ($transaction->status_id == 1) {
                        $transaction->Pay($notification['tr_paid']);
                    }
                }

                return $transaction;
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
