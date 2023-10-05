<?php

namespace App\Http\Traits;

trait ArrayOperationsTrait {

    /**
     * get index of needle in haystack
     *
     * @param [type] $needle
     * @param array $haystack
     * @return int
     */
    public function GetIndexOfArrayElement($needle, $haystack) {
        if (in_array($needle, $haystack)) {
            $index = array_search($needle, $haystack);
            return $index;
        }

        return false;
    }

    /**
     * slice array from index to end
     *
     * @param int $index
     * @param array $array
     * @return array
     */
    public function SliceArrayFromIndex($index, $array) {
        $new = array();
        if ($index!==false) {
           
            for ($i = $index + 1; $i < count($array); $i++) {
                $new[] = $array[$i];
            }
        }

        return $new;
    }
}