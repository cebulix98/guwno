<?php

namespace App\Models\Motion;

use App\Http\Custom\Parameters;
use App\Http\Traits\MoneyCalculationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotionPrice extends Model
{
    use HasFactory, MoneyCalculationTrait, SoftDeletes;

    protected $fillable = [
        'motion_id', 'origin_id', 'single_price_netto', 'total_price_netto', 'total_price_brutto', 'vat_rate', 'discount', 'discount_is_percentage'
    ];

    /**
     * relation: motion
     *
     * @return Motion
     */
    public function motion()
    {
        return $this->hasOne(Motion::class, 'id', 'motion_id');
    }

    /**
     * relation: DictionaryWeb
     *
     * @return DictionaryWeb
     */
    public function origin()
    {
        return $this->hasOne(DictionaryWeb::class, 'id', 'origin_id');
    }

    /**
     * update price
     *
     * @param float $netto
     * @return void
     */
    public function UpdateSinglePriceNetto($netto)
    {
        $this->single_price_netto = $netto;
        $this->save();
    }

    /**
     * update price
     *
     * @param float $brutto
     * @return void
     */
    public function UpdateSinglePriceBrutto($brutto)
    {
        $this->single_price_brutto = $brutto;
        $this->save();
    }

    /**
     * update vat rate
     *
     * @param float $vat_rate
     * @return void
     */
    public function UpdateVatRate($vat_rate)
    {
        $this->vat_rate = $vat_rate;
        $this->save();
    }

    /**
     * calculate price
     *
     * @return void
     */
    public function CalculateTotal()
    {
        $this->CalculateSinglePriceNetto();
        $this->refresh();
        $this->CalculateTotalPriceBrutto();
        $this->refresh();
        $this->CalculateTotalPriceNetto();
    }

    /**
     * calculate single brutto
     *
     * @return void
     */
    public function CalculateSinglePriceNetto()
    {
        $vat_rate = ($this->vat_rate) ? $this->vat_rate : Parameters::VAT_RATE;
        $netto = $this->CalculateNetto($this->single_price_brutto, $vat_rate);
        $vat = $this->CalculateVat($netto, $vat_rate);

        $this->single_price_netto = $netto;
        $this->save();
    }


    /**
     * calculate single brutto
     *
     * @return void
     */
    public function CalculateSinglePriceBrutto()
    {
        $vat_rate = ($this->vat_rate) ? $this->vat_rate : Parameters::VAT_RATE;
        $vat = $this->CalculateVat($this->single_price_netto, $vat_rate);
        $brutto = $this->CalculateBrutto($this->single_price_netto, $vat);

        $this->single_price_brutto = $brutto;
        $this->save();
    }

    /**
     * calculate total brutto
     *
     * @return void
     */
    public function CalculateTotalPriceBrutto()
    {
        $discount = ($this->discount_is_percentage) ? $this->single_price_brutto * $this->discount / 100 : $this->discount;

        $total = $this->single_price_brutto - $discount;
        if ($total < 0) $total = 0;

        $this->total_price_brutto = $total;
        $this->save();
    }

    /**
     * calculate total netto with discount
     *
     * @return void
     */
    public function CalculateTotalPriceNetto()
    {
        $vat_rate = ($this->vat_rate) ? $this->vat_rate : Parameters::VAT_RATE;
        $netto = $this->CalculateNetto($this->total_price_brutto, $vat_rate);
        $vat = $this->CalculateVat($netto, $vat_rate);

        $this->total_price_netto = $netto;
        $this->save();
    }

    /**
     * update price
     *
     * @param float $netto
     * @param float $vat_rate
     * @return void
     */
    public function UpdateAll($brutto, $vat_rate)
    {
        $this->UpdateSinglePriceBrutto($brutto);
        $this->CalculateSinglePriceNetto();
        $this->UpdateVatRate($vat_rate);
        $this->refresh();
        $this->CalculateTotal();
    }
}
