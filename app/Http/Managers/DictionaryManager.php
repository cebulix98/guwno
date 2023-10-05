<?php

namespace App\Http\Managers;

use App\Models\Dictionary\DictionaryAddressType;
use App\Models\Dictionary\DictionaryAgreement;
use App\Models\Dictionary\DictionaryAgreementCaseType;
use App\Models\Dictionary\DictionaryAgreementUserType;
use App\Models\Dictionary\DictionaryCaseStatus;
use App\Models\Dictionary\DictionaryCaseType;
use App\Models\Dictionary\DictionaryContactCategory;
use App\Models\Dictionary\DictionaryContactType;
use App\Models\Dictionary\DictionaryHistoryEvent;
use App\Models\Dictionary\DictionaryWeb;


//complex static classes
class DictionaryManager
{
    public $dictionary = [
        'dictionary_agreements',
        'dictionary_agreement_user_types',
        'dictionary_agreement_case_types',
        'dictionary_address_types',
        'dictionary_contact_categories',
        'dictionary_contact_types',
        'dictionary_webs',
        'dictionary_case_statuses',
        'dictionary_case_types',
        'dictionary_history_events',
    ];

    /**
     * create factory
     *
     * @param string $table_name
     * @param array $data
     * @return *
     */
    public static function CreateFactory($table_name, $data)
    {
        switch ($table_name) {
            case 'dictionary_address_types':
                return DictionaryAddressType::factory()->create($data);
                break;
            case 'dictionary_contact_categories':
                return DictionaryContactCategory::factory()->create($data);
                break;
            case 'dictionary_contact_types':
                return DictionaryContactType::factory()->create($data);
                break;
            case 'dictionary_case_types':
                return DictionaryCaseType::factory()->create($data);
                break;
            case 'dictionary_case_statuses':
                return DictionaryCaseStatus::factory()->create($data);
                break;
            case 'dictionary_history_events':
                return DictionaryHistoryEvent::factory()->create($data);
                break;
            case 'dictionary_webs':
                return DictionaryWeb::factory()->create($data);
                break;
            case 'dictionary_agreements':
                return DictionaryAgreement::factory()->create($data);
                break;
            case 'dictionary_agreement_user_types':
                return DictionaryAgreementUserType::factory()->create($data);
                break;
            case 'dictionary_agreement_case_types':
                return DictionaryAgreementCaseType::factory()->create($data);
                break;
        }
    }
    /**
     * get all rows
     *
     * @param string $table_name
     * @return array
     */
    public static function GetAll($table_name)
    {
        switch ($table_name) {
            case 'dictionary_address_types':
                return DictionaryAddressType::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
                break;
            case 'dictionary_contact_categories':
                return DictionaryContactCategory::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
                break;
            case 'dictionary_contact_types':
                return DictionaryContactType::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
                break;
            case 'dictionary_case_types':
                return DictionaryCaseType::all();
                break;
            case 'dictionary_case_statuses':
                return DictionaryCaseStatus::all();
                break;
            case 'dictionary_history_events':
                return DictionaryHistoryEvent::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
                break;
            case 'dictionary_webs':
                return DictionaryWeb::all()->sortBy('url', SORT_NATURAL | SORT_FLAG_CASE);
                break;
            case 'dictionary_agreements':
                return DictionaryAgreement::all()->sortBy('name', SORT_NATURAL | SORT_FLAG_CASE);
                break;
            case 'dictionary_agreement_user_types':
                return DictionaryAgreementUserType::all();
                break;
            case 'dictionary_agreement_case_types':
                return DictionaryAgreementCaseType::all();
                break;
            default:
                return array();
                break;
        }
    }

    /**
     * find one model
     *
     * @param string $table_name
     * @param int $id
     * @return *
     */
    public static function GetOne($table_name, $id)
    {
        switch ($table_name) {
            case 'dictionary_address_types':
                return DictionaryAddressType::find($id);
                break;
            case 'dictionary_contact_categories':
                return DictionaryContactCategory::find($id);
                break;
            case 'dictionary_contact_types':
                return DictionaryContactType::find($id);
                break;
            case 'dictionary_case_types':
                return DictionaryCaseType::find($id);
                break;
            case 'dictionary_case_statuses':
                return DictionaryCaseStatus::find($id);
                break;
            case 'dictionary_history_events':
                return DictionaryHistoryEvent::find($id);
                break;
            case 'dictionary_webs':
                return DictionaryWeb::find($id);
                break;
            case 'dictionary_agreements':
                return DictionaryAgreement::find($id);
                break;
            case 'dictionary_agreement_user_types':
                return DictionaryAgreementUserType::find($id);
                break;
            case 'dictionary_agreement_case_types':
                return DictionaryAgreementCaseType::find($id);
                break;
            default:
                return null;
                break;
        }
    }

    /**
     * get class name
     *
     * @param string $table_name
     * @return string
     */
    public static function GetClassName($table_name)
    {
        switch ($table_name) {
            case 'dictionary_address_types':
                return DictionaryAddressType::class;
                break;
            case 'dictionary_contact_categories':
                return DictionaryContactCategory::class;
                break;
            case 'dictionary_contact_types':
                return DictionaryContactType::class;
                break;
            case 'dictionary_case_types':
                return DictionaryCaseType::class;
                break;
            case 'dictionary_case_statuses':
                return DictionaryCaseStatus::class;
                break;
            case 'dictionary_history_events':
                return DictionaryHistoryEvent::class;
                break;
            case 'dictionary_webs':
                return DictionaryWeb::class;
                break;
            case 'dictionary_agreements':
                return DictionaryAgreement::class;
                break;
            case 'dictionary_agreement_user_types':
                return DictionaryAgreementUserType::class;
                break;
            case 'dictionary_agreement_case_types':
                return DictionaryAgreementCaseType::class;
                break;
        }
    }

    /**
     * get foreign key options
     *
     * @param string $table_name
     * @param string $attribute
     * @return array
     */
    public static function GetOptions($table_name, $attribute)
    {
        switch ($table_name) {
            case 'dictionary_agreements':
                return array();
                break;
            case 'dictionary_address_types':
                return array();
                break;
            case 'dictionary_contact_categories':
                return array();
                break;
            case 'dictionary_contact_types':
                return DictionaryContactType::GetOptions($attribute);
                break;
            case 'dictionary_case_types':
                return array();
                break;
            case 'dictionary_case_statuses':
                return array();
                break;
            case 'dictionary_history_events':
                return array();
                break;
            case 'dictionary_webs':
                return DictionaryWeb::GetOptions($attribute);
                break;
            case 'dictionary_agreements':
                return array();
                break;
            case 'dictionary_agreement_user_types':
                return DictionaryAgreement::all();
                break;
            case 'dictionary_agreement_case_types':
                return DictionaryAgreement::all();
                break;
            default:
                return array();
                break;
        }
    }
}
