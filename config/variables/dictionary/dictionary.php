<?php

return [
    'contractor_type' =>
    [
        'contractor_type_person' => [
            'name' => 'Osoba prywatna',
            'code' => 'contractor_type_person',
        ],

        'contractor_type_company' => [
            'name' => 'Firma',
            'code' => 'contractor_type_company',
        ],
    ],

    //rodzaj kontaktu
    'contact_category' => [
        'contact_category_phone' => [
            'name' => 'telefon',
            'code' => 'contact_category_phone',
        ],

        'contact_category_email' => [
            'name' => 'email',
            'code' => 'contact_category_email',
        ],

        'contact_category_link' => [
            'name' => 'link',
            'code' => 'contact_category_link',
        ],

        'contact_category_other' => [
            'name' => 'inny',
            'code' => 'contact_category_other',
        ],
    ],

    //zaprogramowany status
    'status' => [
        'status_wait_verification' => [
            'name' => 'oczekuje na weryfikację',
            'code' => 'status_wait_verification',
        ],

        'status_wait_start' => [
            'name' => 'czeka na rozpoczęcie',
            'code' => 'status_wait_start',
        ],

        'status_started' => [
            'name' => 'rozpoczęty',
            'code' => 'status_started',
        ],

        'status_ended' => [
            'name' => 'zakończony',
            'code' => 'status_ended',
        ],

        'status_cancelled' => [
            'name' => 'anulowany',
            'code' => 'status_cancelled',
        ],

        'status_wait_reply' => [
            'name' => 'oczekuje na odpowiedź',
            'code' => 'status_wait_reply',
        ],

        'status_replied' => [
            'name' => 'odpowiedziano',
            'code' => 'status_replied',
        ],
    ],
];
