<?php

namespace App\Models\Order;

use App\Http\Creators\OrderCreator;
use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Models\Cases\CaseCase;
use App\Models\Dictionary\DictionaryPaymentStatus;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public const COUNTER_NAME = "order_id";

    protected $fillable = [
        'case_id', 'user_id', 'code', 'status_id', 'total_price_brutto', 'total_price_netto', 'price_vat_rate', 'price_netto', 'price_discount',
        'total_paid', 'total_to_pay', 'date_payment'
    ];

    /**
     * relation: case
     *
     * @return CaseCase
     */
    public function case()
    {
        return $this->hasOne(CaseCase::class, 'id', 'case_id');
    }

    /**
     * relation: user
     *
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
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
     * generate order code
     *
     * @return string
     */
    public function GenerateCode()
    {
        $code = Carbon::now()->format('Y') . $this->id;
        $this->code = $code;
        $this->save();
    }

    /**
     * calculate how much was paid
     *
     * @param float $amount
     * @return void
     */
    public function CalculatePay($amount)
    {
        if ($this->total_paid == null) $this->total_paid = 0;
        if ($this->total_to_pay == null) $this->total_to_pay = 0;

        $this->total_paid += $amount;
        $this->total_to_pay -= $amount;
        if ($this->total_to_pay < 0) $this->total_to_pay = 0;

        $this->save();
    }

    /**
     * update date of payment
     *
     * @return void
     */
    public function UpdateDatePaid() {
        $this->date_payment = Carbon::now();
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

            $this->CalculatePay($amount);
            $this->UpdateDatePaid();

            $this->case->RecordEvent(CaseEventEnum::EVENT_ORDER_PAID,$amount);
        }
    }

    public function CreateTransaction($title, $result_url) {

       $model=  OrderCreator::CreateOrderTransaction($this->id, $this->total_price_netto, $title, $this->payer_email, $this->payer_name, $result_url, $this->total_price_brutto);
       return $model;
    }
}
