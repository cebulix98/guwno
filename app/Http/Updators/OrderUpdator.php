<?php

namespace App\Http\Updators;



class OrderUpdator
{
    /**
     * update selected attribute
     *
     * @param * $model
     * @param string $value
     * @param string $selector selector name
     * @return void
     */
    public static function Selector($model, $value, $selector)
    {
        switch ($selector) {
            case 'status_id':
                CommonUpdator::UpdateStatus($model, $value);
                break;
        }
    }
}
