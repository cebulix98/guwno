<?php

namespace App\Http\Custom;

/** app parameters */
class Parameters
{
    /** upload image max size in kilobytes - max rozmiar obrazka */
    public const IMAGE_MAX_SIZE = 10000;
    /** max upload file size - max rozmiar pliku */
    public const FILE_MAX_SIZE = 10000;
    /** default system timezone - strefa czasowa */
    public const DEFAULT_TIMEZONE = "Europe/Warsaw";
    /** csv file default column separator */
    public const DEFAULT_CSV_SEPARATOR = ';';
    /** items per page default - ile elementow na strone - domyslne*/
    public const ITEMS_PER_PAGE_BASIC = 20;
    /** how many items in carousel max - ile elementow max w karuzeli */
    public const ITEMS_PER_CAROUSEL = 20;
    /** mails per page - ile maili na strone */
    public const ITEMS_PER_PAGE_MAIL = 30;
    /** default vat rate */
    public const VAT_RATE = 0.23;
    /** default vat rate percentage*/
    public const VAT_RATE_PERCENTAGE = 23;
    /** api key for gus */
    public const GUS_API_KEY = 'f527f8f40e3f4740bd34';

    public const ITEM_MAX_TAGS = 8;
    public const ITEM_MAX_CONTACTS = 8;

    public const PATH_PDF_MOTION = 'motions';

    // TPAY

    //Ustawienia>Powiadomienia>Kod bezpieczenstwa
    public const TPAY_MERCHANT_SECRET = 'WGqbt>cR14hB4>Nd?<';
    //id to login
    public const TPAY_MERCHANT_ID = 77014;

    //nie wymagane, mail do powiadomień
    public const TPAY_MERCHANT_EMAIL = 'shop@example.com';
}
