<?php

namespace App\Http\Creators;

use App\Http\Custom\Parameters;
use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Models\Order\Order;
use App\Models\Order\OrderTransaction;
use Carbon\Carbon;

/** db model creator */
class OrderCreator
{

    /**
     * create model
     *
     * @param int $case_id
     * @param float $total_price_netto
     * @param int $user_id
     * @return Order
     */
    public static function CreateOrder($case_id, $user_id, $email, $name, $netto, $total_netto, $vat_rate, $total_brutto)
    {
        $model = Order::create([
            'case_id' => $case_id,
            'user_id' => $user_id,
            'status_id' => 1,
            'total_price_netto' => $total_netto,
            'total_price_brutto' => $total_brutto,
            'price_vat_rate' => $vat_rate,
            'price_netto' => $netto,
            'price_discount' => 0,
            'total_paid' => 0,
            'total_to_pay' => $total_brutto,
            'payer_email' => $email,
            'payer_name' => $name
        ]);

        $model->GenerateCode();
        $model->case->RecordEvent(CaseEventEnum::EVENT_ADD_ORDER);

        return $model;
    }

    /**
     * create model
     *
     * @param int $order_id
     * @param float $total_price_netto
     * @param string $title
     * @param string $result_url
     * @return OrderTransaction
     */
    public static function CreateOrderTransaction($order_id, $total_price_netto, $title, $email, $name, $result_url, $total_price_brutto)
    {
        $model = OrderTransaction::create([
            'order_id' => $order_id,
            'status_id' => 1,
            'total_price_netto' => $total_price_netto,
            'title' => $title,
            'result_url' => $result_url,
            'payer_email' => $email,
            'payer_name' => $name,
            'total_price_brutto' => $total_price_brutto,
        ]);

        $model->GenerateCrc();

        return $model;
    }
}
