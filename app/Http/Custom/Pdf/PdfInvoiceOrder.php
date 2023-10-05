<?php

namespace App\Http\Custom\Pdf;

use App\Models\Item\Item;
use App\Models\Order\Order;
use Exception;
use PDF;

/** create pdf file */
class PdfInvoiceOrder
{
    protected $order_id;

    public function __construct($order_id)
    {
        $this->order_id = $order_id;
        $this->order = Order::find($order_id);

    }

    public function GenerateInvoice() {
        if(!$this->order || !$this->order->item) throw new Exception();

        $contractor = $this->order->item->contractor;
        $services = $this->order->services;

        $parameters = $this->GenerateParameters($contractor, $services);

        return $parameters;
    }

    public function GenerateParameters($contractor, $services) {
        $parameters = new PdfInvoiceParameters($contractor, $services, $this->order->total_price_netto);

        return $parameters;
    }

}
