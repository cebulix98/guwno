<?php

namespace App\Http\Traits;

trait StringOperationsTrait {


    /**
     * explode string into array by separator
     *
     * @param string $string
     * @param string $separator
     * @return array
     */
    public static function ExplodeString($string, $separator) {
        return explode($separator, $string);
    }

    /**
     * get first letters from string with many words
     *
     * @param string $string
     * @param int $quantity how many letters
     * @return string
     */
    public function GetFirstLetters($string, $quantity) {
        $words = $this->ExplodeString($string, ' ');
        $initials = '';

        foreach($words as $word) {
            $initial = substr($word, 0, $quantity);
        }

        $initials .= $initial;

        return $initials;
    }

    /**
     * get initials from name
     *
     * @param string $firstname
     * @param string $lastname
     * @return string
     */
    public function GetInitials($firstname, $lastname, $how_many_letters) {
        $initials = $this->GetFirstLetters($firstname,$how_many_letters);
        $initials.=$this->GetFirstLetters($lastname,$how_many_letters);

        return $initials;
    }
}