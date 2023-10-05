<?php

namespace App\Http\Custom\TPay;

class TpayHandler
{
    /**
     * price amount
     *
     * @var float
     */
    protected $amount;

    /**
     * customer email
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
     * redirect url after success
     *
     * @var string
     */
    protected $redirectUrl;

    /**
     * where to post transaction results
     *
     * @var string
     */
    protected $resultUrl;

    /**
     * transaction unique id
     *
     * @var string
     */
    protected $crc;

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
        $this->resultUrl = $resultUrl;
        $this->crc = $crc;
    }

    /**
     * generate form
     *
     * @return void
     */
    public function Handle()
    {
        $manager = new TpayApiForm($this->amount, $this->contactEmail, $this->contactName, $this->transactionTitle, $this->redirectUrl, $this->resultUrl, $this->crc);
        $manager->getBankForm();
    }
}
