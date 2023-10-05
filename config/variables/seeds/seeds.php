<?php

return [
    //typ adresu
    'address_type' => [
        [
            'name' => 'zameldowania',
        ],

        [
            'name' => 'zamieszkania',
        ],

        [
            'name' => 'firmowy',
        ],
    ],

    //typ kontaktu
    'contact_type' => [
        [
            'name' => 'email',
            'category_id' => 2,
            'icon' => "<i class='fas fa-envelope'></i>"
        ],

        [
            'name' => 'telefon kom.',
            'category_id' => 1,
            'icon' => "<i class='fas fa-phone'></i>"
        ],

        [
            'name' => 'telefon stacjonarny',
            'category_id' => 1,
            'icon' => "<i class='fas fa-phone'></i>"
        ],

        [
            'name' => 'www',
            'category_id' => 3,
            'icon' => "<i class='fas fa-globe'></i>"
        ],
    ],

    'agreements' => [
        [
            'name' => 'Zgoda na przetwarzanie danych',
            'description' => 'Zgoda na przetwarzanie danych',
            'is_required' => true
        ]
    ],

    //SYSTEMOWE

    //typ kontrahenta
    'contractor_type' =>
    [
        [
            'name' => 'Osoba prywatna',
            'code' => 'contractor_type_person',
        ],

        [
            'name' => 'Firma',
            'code' => 'contractor_type_company',
        ],
    ],

    //rodzaj kontaktu
    'contact_category' => [
        [
            'name' => 'telefon',
            'code' => 'contact_category_phone',
        ],

        [
            'name' => 'email',
            'code' => 'contact_category_email',
        ],

        [
            'name' => 'link',
            'code' => 'contact_category_link',
        ],

        [
            'name' => 'inny',
            'code' => 'contact_category_other',
        ],
    ],

    'case_type' => [
        [
            'name' => 'typ 1',
            'code' => 'case_type_1',
        ],
    ],

    'motion' => [
        [
            'name' => 'Wniosek o dozór elektroniczny',
            'code' => 'motion_type_1',
        ],

        [
            'name' => 'Adwokat na wokandę',
            'code' => 'motion_type_2',
        ],

        [
            'name' => 'Porada prawna na telefon',
            'code' => 'motion_type_3',
        ],

        [
            'name' => 'Wniosek o odroczenie stan zdrowia',
            'code' => 'motion_type_4',
        ],

        [
            'name' => 'Wniosek o odroczenie sytuacja rodzinna',
            'code' => 'motion_type_5',
        ],

        [
            'name' => 'Wniosek o przerwę stan zdrowia',
            'code' => 'motion_type_6',
        ],

        [
            'name' => 'Wniosek o przerwę sytuacja rodzinna',
            'code' => 'motion_type_7',
        ],

        [
            'name' => 'Do testowania',
            'code' => 'motion_type_8',
        ],

        [
            'name' => 'Reprezentacja na rozprawie',
            'code' => 'motion_type_9',
        ],

        [
            'name' => 'Formularz kontaktowy',
            'code' => 'motion_type_10',
        ],
    ],

    //zaprogramowany status
    'status' => [
        [
            'name' => 'oczekuje na weryfikację',
            'code' => 'status_wait_verification',
        ],

        [
            'name' => 'czeka na rozpoczęcie',
            'code' => 'status_wait_start',
        ],

        [
            'name' => 'rozpoczęty',
            'code' => 'status_started',
        ],

        [
            'name' => 'zakończony',
            'code' => 'status_ended',
        ],

        [
            'name' => 'anulowany',
            'code' => 'status_cancelled',
        ],

        [
            'name' => 'oczekuje na odpowiedź',
            'code' => 'status_wait_reply',
        ],

        [
            'name' => 'odpowiedziano',
            'code' => 'status_replied',
        ],

        [
            'name' => 'oczekuje na zapłatę',
            'code' => 'status_wait_payment',
        ],

        [
            'name' => 'zapłacony',
            'code' => 'status_paid',
        ],

        [
            'name' => 'zapłacony częściowo',
            'code' => 'status_paid_partly',
        ],
    ],

    'status_item' => [
        [
            'name' => 'oczekuje na weryfikację',
            'name_lang' => 'system.status_item.wait_verification',
            'code' => 'status_wait_verification',
        ],

        [
            'name' => 'czeka na rozpoczęcie',
            'name_lang' => 'system.status_item.wait_start',
            'code' => 'status_wait_start',
        ],

        [
            'name' => 'rozpoczęty',
            'name_lang' => 'system.status_item.started',
            'code' => 'status_started',
        ],

        [
            'name' => 'zakończony',
            'name_lang' => 'system.status_item.ended',
            'code' => 'status_ended',
        ],

        [
            'name' => 'anulowany',
            'name_lang' => 'system.status_item.cancelled',
            'code' => 'status_cancelled',
        ],
    ],

    'status_common' => [
        [
            'name' => 'oczekuje na weryfikację',
            'name_lang' => 'system.status_common.wait_verification',
            'code' => 'status_wait_verification',
        ],

        [
            'name' => 'czeka na rozpoczęcie',
            'name_lang' => 'system.status_common.wait_start',
            'code' => 'status_wait_start',
        ],

        [
            'name' => 'rozpoczęty',
            'name_lang' => 'system.status_common.started',
            'code' => 'status_started',
        ],

        [
            'name' => 'zakończony',
            'name_lang' => 'system.status_common.ended',
            'code' => 'status_ended',
        ],

        [
            'name' => 'anulowany',
            'name_lang' => 'system.status_common.cancelled',
            'code' => 'status_cancelled',
        ],
    ],

    'status_case' => [
        [
            'name' => 'oczekuje na przydzielenie',
            'name_lang' => 'system.status_case.wait_assignment',
            'code' => 'status_wait_assignment',
        ],

        [
            'name' => 'czeka na rozpoczęcie',
            'name_lang' => 'system.status_case.wait_start',
            'code' => 'status_wait_start',
        ],

        [
            'name' => 'rozpoczęty',
            'name_lang' => 'system.status_case.started',
            'code' => 'status_started',
        ],

        [
            'name' => 'zakończony',
            'name_lang' => 'system.status_case.ended',
            'code' => 'status_ended',
        ],

        [
            'name' => 'anulowany',
            'name_lang' => 'system.status_case.cancelled',
            'code' => 'status_cancelled',
        ],
    ],

    'status_payment' => [
        [
            'name' => 'oczekuje na zapłatę',
            'name_lang' => 'system.status_payment.wait_payment',
            'code' => 'status_wait_payment',
        ],

        [
            'name' => 'zapłacony',
            'name_lang' => 'system.status_payment.paid',
            'code' => 'status_paid',
        ],

        [
            'name' => 'zapłacony częsciowo',
            'name_lang' => 'system.status_payment.paid_partly',
            'code' => 'status_paid_partly',
        ],

        [
            'name' => 'anulowany',
            'name_lang' => 'system.status_payment.cancelled',
            'code' => 'status_cancelled',
        ],
    ],

    'dictionary' => [
        ['name' => 'Strony web', 'code' => 'dictionary_webs', 'table_name' => 'dictionary_webs', 'is_editable' => 1, 'is_visible' => 1],
        ['name' => 'Typy adresu', 'code' => 'dictionary_address_types', 'table_name' => 'dictionary_address_types', 'is_editable' => 1, 'is_visible' => 0],
        ['name' => 'Typy kontaktu', 'code' => 'dictionary_contact_types', 'table_name' => 'dictionary_contact_types', 'is_editable' => 1, 'is_visible' => 1],
        ['name' => 'Rodzaje kontaktu', 'code' => 'dictionary_contact_categories', 'table_name' => 'dictionary_contact_categories', 'is_editable' => 0, 'is_visible' => 0],
        ['name' => 'Statusy spraw', 'code' => 'dictionary_case_statuses', 'table_name' => 'dictionary_case_statuses', 'is_editable' => 0, 'is_visible' => 1],
        ['name' => 'Zgody', 'code' => 'dictionary_agreements', 'table_name' => 'dictionary_agreements', 'is_editable' => 1, 'is_visible' => 1],
        ['name' => 'Zgody użytkowników', 'code' => 'dictionary_agreement_user_types', 'table_name' => 'dictionary_agreement_user_types', 'is_editable' => 1, 'is_visible' => 1],
        ['name' => 'Zgody spraw', 'code' => 'dictionary_agreement_case_types', 'table_name' => 'dictionary_agreement_case_types', 'is_editable' => 1, 'is_visible' => 1],
    ],

    'history_events' => [
        [
            'name' => 'Utworzenie sprawy',
            'code' => 'event_created'
        ],

        [
            'name' => 'Przydzielenie prawnika',
            'code' => 'event_add_lawyer'
        ],

        [
            'name' => 'Usunięcie prawnika',
            'code' => 'event_remove_lawyer'
        ],

        [
            'name' => 'Przekazanie sprawy innemu prawnikowi',
            'code' => 'event_reassign_lawyer'
        ],

        [
            'name' => 'Zamknięcie sprawy',
            'code' => 'event_end'
        ],

        [
            'name' => 'Anulowanie sprawy',
            'code' => 'event_cancel'
        ],

        [
            'name' => 'Rozpoczęcie sprawy',
            'code' => 'event_start'
        ],

        [
            'name' => 'Zmiana statusu',
            'code' => 'event_change_status'
        ],

        [
            'name' => 'Aktualizacja atrybutu',
            'code' => 'event_update_attribute'
        ],

        [
            'name' => 'Zmiana imienia i nazwiska wnioskodawcy',
            'code' => 'event_update_petitioner_name'
        ],

        [
            'name' => 'Zmiana nr telefonu wnioskodawcy',
            'code' => 'event_update_petitioner_phone'
        ],

        [
            'name' => 'Zmiana adresu email wnioskodawcy',
            'code' => 'event_update_petitioner_email'
        ],

        [
            'name' => 'Zmiana danych kontaktowych',
            'code' => 'event_update_contact_data'
        ],

        [
            'name' => 'Aktualizacja notatki',
            'code' => 'event_update_note'
        ],

        [
            'name' => 'Dodanie załącznika',
            'code' => 'event_add_attachement'
        ],

        [
            'name' => 'Usunięcie załącznika',
            'code' => 'event_remove_attachement'
        ],

        [
            'name' => 'Usunięcie notatki',
            'code' => 'event_delete_note'
        ],

        [
            'name' => 'Dodanie notatki',
            'code' => 'event_add_note'
        ],

        [
            'name' => 'Wysłanie odpowiedzi',
            'code' => 'event_add_response'
        ],

        [
            'name' => 'Utworzenie transakcji płatności',
            'code' => 'event_add_order'
        ],

        [
            'name' => 'Zarchiwizowanie sprawy',
            'code' => 'event_delete_case'
        ],

        [
            'name' => 'Aktualizacja nazwy sprawy',
            'code' => 'event_update_case_name'
        ],

        [
            'name' => 'Aktualizacja pliku pdf wniosku',
            'code' => 'event_update_case_motion_pdf'
        ],

        [
            'name' => 'Aktualizacja pliku rtf wniosku',
            'code' => 'event_update_case_motion_rtf'
        ],

        [
            'name' => 'Opłacenie transakcji',
            'code' => 'event_order_paid'
        ],

        [
            'name' => 'Aktualizacja pliku txt wniosku',
            'code' => 'event_update_case_motion_txt'
        ],
    ],

    'webs' => [
        [
            'name' => 'http://prawnik.testiten.pl/',
            'url' => 'http://prawnik.testiten.pl/',
            'code' => 'web_1',
            'is_active' => 1
        ]
    ],

    'response_footers' => [
        [
            'code' => 'system_response_footer',
            'is_primary' => 1
        ]
    ]

];
