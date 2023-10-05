<?php

namespace App\Http\Custom\Pdf;

use App\Models\Item\Item;
use Exception;
use PDF;

/** create pdf file */
class PdfInvoice
{
    protected $item_id;

    public function __construct($item_id)
    {
        $this->item_id = $item_id;
        $this->item = Item::find($item_id);

    }

    public function GenerateInvoice() {
        if(!$this->item) throw new Exception();

        $contractor = $this->item->contractor;
        $services = $this->item->services;

        $parameters = $this->GenerateParameters($contractor, $services);

        return $parameters;
    }

    public function GenerateParameters($contractor, $services) {
        $total = $this->GetTotalPrice($services);
        $parameters = new PdfInvoiceParameters($contractor, $services, $total);

        return $parameters;
    }

    public function GetTotalPrice($services) {
        $total = 0;

        foreach($services as $service) {
            $total += $service->price_netto;
        }

        return $total;
    }
}
