<?php

namespace App\Http\Custom\TPay;

use App\Http\Custom\Parameters;
use tpayLibs\src\_class_tpay\Notifications\BasicNotificationHandler;

include_once 'config.php';
include_once 'loader.php';

class TPayNotification extends BasicNotificationHandler  {

    public function __construct()
    {
        $this->merchantSecret = Parameters::TPAY_MERCHANT_SECRET;
        $this->merchantId = Parameters::TPAY_MERCHANT_ID;
        parent::__construct();

    }

    /**
     * @return array
     */
    public function getTpayNotification()
    {
        return $this->checkPayment();
    }
}