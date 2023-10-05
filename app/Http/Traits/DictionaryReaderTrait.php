<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Log;

//handle pagination
trait DictionaryReaderTrait
{
    /**
     * read dictionary from config
     *
     * @param string $code
     * @return array
     */
    public function ReadConfigDictionary($code)
    {
        switch ($code) {
            case 'contractor_type':
                return config('variables.dictionary.dictionary.contractor_type');
                break;
            case 'contact_category':
                return config('variables.dictionary.dictionary.contact_category');
                break;
            case 'status':
                return config('variables.dictionary.dictionary.status');
                break;
        }
    }

    /**
     * get status name from config
     *
     * @param string $status_code
     * @return string
     */
    public function GetStatusFromConfig($status_code)
    {
        $statuses = $this->ReadConfigDictionary('status');
        $result = false;

        if (isset($statuses[$status_code])) $result = $statuses[$status_code]['name'];

        return $result;
    }
}
