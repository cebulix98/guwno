<?php

namespace App\Http\Traits\Validation;


trait ValidationCredentialsTrait
{

    /**
     * get date from pesel
     *
     * @param string $pesel
     * @return array
     */
    public static function GetDatePesel($pesel)
    {
        $month = substr($pesel, 2, 2);
        $day = substr($pesel, 4, 2);

        $arrmonth = array(80, 0, 20, 40, 60);
        $arrmonthbase = range(1, 12);

        foreach ($arrmonth  as $row) {
            foreach ($arrmonthbase as $base) {
                $months[] = $row + $base;
            }
        }

        if (!in_array($month, $months)) return false;

        if (substr($month, 0, 1) == '0' || substr($month, 0, 1) == '1') $tyear = 1900;
        if (substr($month, 0, 1) == '8' || substr($month, 0, 1) == '9') $tyear = 1800;
        if (substr($month, 0, 1) == '2' || substr($month, 0, 1) == '3') $tyear = 2000;
        if (substr($month, 0, 1) == '5' || substr($month, 0, 1) == '4') $tyear = 2100;
        if (substr($month, 0, 1) == '6' || substr($month, 0, 1) == '7') $tyear = 2200;
        if ($tyear == 2000) $month = $month - 20;
        if ($tyear == 1800) $month = $month - 80;
        if ($tyear == 2100) $month = $month - 40;
        if ($tyear == 2200) $month = $month - 60;

        $year = $tyear + substr($pesel, 0, 2);

        return array($year, $month, $day);
    }

    /**
     * get birth date from pesel or date
     *
     * @param Date $date
     * @param string $pesel
     * @return void
     */
    public static function GetBirthday($date, $pesel) {
        if($date!=null) return $date;

        $birthday = ValidationCredentialsTrait::GetDatePesel($pesel);

        return $birthday;
    }
}
