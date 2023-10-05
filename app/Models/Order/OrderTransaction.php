<?php

namespace App\Models\Order;

use App\Models\Dictionary\DictionaryPaymentStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransaction extends Model
{
    use HasFactory;

    public const COUNTER_NAME = "order_transaction_id";

    protected $fillable = [
        'order_id', 'status_id', 'total_price_netto', 'title', 'crc', 'result_url', 'total_price_brutto'
    ];

    /**
     * relation: order
     *
     * @return Order
     */
    public function order()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    /**
     * relation: status
     *
     * @return DictionaryPaymentStatus
     */
    public function status()
    {
        return $this->hasOne(DictionaryPaymentStatus::class, 'id', 'status_id');
    }

    /**
     * generate order code
     *
     * @return string
     */
    public function GenerateCrc()
    {
        $code = Carbon::now()->format('Y') . $this->order_id . $this->id;
        $this->crc = $code;
        $this->save();
    }

    /**
     * update status
     *
     * @param int $id
     * @return void
     */
    public function UpdateStatus($id)
    {
        $this->status_id = $id;
        $this->save();
    }

    /**
     * pay transaction
     *
     * @param float $amount
     * @return void
     */
    public function Pay($amount)
    {
        if ($amount > 0) {
            if ($amount >= $this->total_price_brutto) {
                $this->UpdateStatus(2);
            } else $this->UpdateStatus(3);

            $this->order->Pay($amount);
        } 
    }
}
