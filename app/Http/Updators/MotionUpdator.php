<?php

namespace App\Http\Updators;



class MotionUpdator
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
            case 'name':
                CommonUpdator::UpdateName($model, $value);
                break;
            case 'type':
                CommonUpdator::UpdateType($model, $value);
                break;
        }
    }
}
