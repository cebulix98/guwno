<?php

namespace App\Http\Custom\TPay;

use App\Http\Custom\Parameters;
use tpayLibs\src\_class_tpay\Utilities\Util;
use tpayLibs\src\_class_tpay\PaymentForms\PaymentBasicForms;

include_once 'config.php';
include_once 'loader.php';

class TpayApiForm extends PaymentBasicForms
{
    /**
     * amount to pay
     *
     * @var float
     */
    protected $amount;

    /**
     * customer contact email
     *
     * @var string
     */
    protected $contactEmail;

    /**
     * customer name
     *
     * @var string
     */
    protected $contactName;

    /**
     * transaction title
     *
     * @var string
     */
    protected $transactionTitle;

    /**
     * url to redirect after end
     *
     * @var string
     */
    protected $redirectUrl;

    /**
     * transaction unique identifier
     *
     * @var string
     */
    protected $crc = '';

    /**
     * where to post results
     *
     * @var string
     */
    protected $resultUrl;

    /**
     * where to email results
     *
     * @var string
     */
    protected $resultEmail = Parameters::TPAY_MERCHANT_EMAIL;

    /**
     * default language
     *
     * @var string
     */
    protected $language = 'PL';

    /**
     * constructor
     *
     * @param float $amount
     * @param string $contactEmail
     * @param string $contactName
     * @param string $transactionTitle
     * @param string $redirectUrl
     * @param string $resultUrl
     * @param string $crc
     */
    public function __construct($amount, $contactEmail, $contactName, $transactionTitle, $redirectUrl, $resultUrl, $crc)
    {
        $this->amount = $amount;
        $this->contactEmail = $contactEmail;
        $this->contactName = $contactName;
        $this->transactionTitle = $transactionTitle;
        $this->redirectUrl = $redirectUrl;

        $this->merchantSecret = Parameters::TPAY_MERCHANT_SECRET;
        $this->merchantId = Parameters::TPAY_MERCHANT_ID;

        $this->resultUrl = $resultUrl;
        $this->crc = $crc;

        parent::__construct();
    }

    /** 
     * get bank selection form
     */
    public function getBankForm()
    {
        (new Util())->setLanguage('pl');

        $config = array(
            'amount' => $this->amount,
            'description' => $this->transactionTitle,
            'crc' => $this->crc,
            'result_url' => $this->resultUrl,
            // 'result_email' => $this->resultEmail,
            'return_url' => $this->redirectUrl,
            'language'  => $this->language,
            // 'email' => $this->contactEmail,
            // 'name' => $this->contactName
        );

        $form = $this->getBankSelectionForm($config, false, true, null, true);

        echo $form;
    }
}
