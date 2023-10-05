<?php

namespace App\Http\Custom;

use App\Http\Custom\Parameters;
use Exception;
use GusApi\Exception\InvalidUserKeyException;
use GusApi\Exception\NotFoundException;
use GusApi\GusApi;
use Illuminate\Support\Facades\Log;

/**
 * obsługa dostępu do bazy gus
 * https://github.com/johnzuk/GusApi
 */
class GusHandler
{
    public const API_KEY = Parameters::GUS_API_KEY;

    /**
     * initiate api
     *
     * @return GusApi
     */
    public function InitiateGusApi()
    {
        try {
            $gus = new GusApi($this::API_KEY);
            $gus->login();
            return $gus;
        } catch (InvalidUserKeyException $e) {
            Log::error($e);
        }
    }

    /**
     * start getting data
     *
     * @param string $keyword
     * @param string $type 'nip' 'regon' 'krs'
     * @return array
     */
    public function Start($keyword, $type)
    {
        $data = false;

        try {
            $gus = $this->InitiateGusApi();
            $hits = $this->GetHits($gus, $keyword, $type);
            $data = $this->ReadData($hits);
        } catch (Exception $e) {
            Log::error($e);
        }

        return $data;
    }

    /**
     * read search hit result data
     *
     * @param SearchReport $hit
     * @return SearchReport
     */
    public function ReadData($hit)
    {
        $result = [
            'name' => $hit->getName(),
            'address' => $hit->getStreet() . ' ' . $hit->getPropertyNumber() . '/' . $hit->getApartmentNumber(),
            'city' => $hit->getCity(),
            'postal_code' => $hit->getZipCode(),
            'regon' => $hit->getRegon(),
            'nip' => $hit->getNip(),
        ];

        return $result;
    }

    /**
     * get hits
     *
     * @param GusApi $gus
     * @param string $keyword
     * @return array
     */
    public function GetByNip($gus, $keyword)
    {
        return $gus->getByNip($keyword);
    }

    /**
     * get hits
     *
     * @param GusApi $gus
     * @param string $keyword
     * @return array
     */
    public function GetByRegon($gus, $keyword)
    {
        return $gus->getByRegon($keyword);
    }

    /**
     * get hits
     *
     * @param GusApi $gus
     * @param string $keyword
     * @return array
     */
    public function GetByKrs($gus, $keyword)
    {
        return $gus->getByKrs($keyword);
    }

    /**
     * get hits
     *
     * @param GusApi $gus
     * @param string $keyword
     * @param string $type 'nip' 'regon' 'krs'
     * @return array
     */
    public function GetHits($gus, $keyword, $type)
    {
        $r_hits = false;

        switch ($type) {
            case 'nip':
                $hits = $this->GetByNip($gus, $keyword);
                break;
            case 'regon':
                $hits = $this->GetByRegon($gus, $keyword);
                break;
            case 'krs':
                $hits = $this->GetByKrs($gus, $keyword);
                break;
        }

        if (\is_array($hits))
            if (count($hits) > 0) $r_hits = $hits[0];

        return $r_hits;
    }
}
