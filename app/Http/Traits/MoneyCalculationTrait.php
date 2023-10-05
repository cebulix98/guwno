<?php


namespace App\Http\Traits;

trait MoneyCalculationTrait {

    /**
     * calculate vat
     *
     * @param float $netto
     * @param float $rate
     * @return float
     */
    public function CalculateVat($netto, $rate) {
        if($netto==null) $netto = 0;
        if($rate==null) $rate = 0;

        $vat = $netto * $rate;
        return $vat;
    }

    /**
     * calculate brutto
     *
     * @param float $netto
     * @param float $vat
     * @return float
     */
    public function CalculateBrutto($netto, $vat) {
        if($netto==null) $netto = 0;
        if($vat==null) $vat = 0;

        $brutto = $netto + $vat;
        return $brutto;
    }

    /**
     * calculate netto
     *
     * @param float $brutto
     * @param float $rate
     * @return float
     */
    public function CalculateNetto($brutto, $rate) {
     
        if($rate==0) return $brutto;

        $netto = $brutto/(1+$rate);

        return $netto;
    }
}