<?php

namespace App\Http\Custom\Pdf;

use Carbon\Carbon;

/** create pdf file */
class PdfInvoiceParameters
{
    public $issued_at;

    public $contractor;

    public $services;

    public $total_price_netto;

    public function __construct($contractor, $services, $total_price_netto)
    {
        $this->issued_at = Carbon::now();
        $this->contractor = $contractor;
        $this->services = $services;
        $this->total_price_netto = $total_price_netto;
    }
}