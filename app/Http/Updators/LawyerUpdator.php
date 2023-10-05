<?php

namespace App\Http\Updators;



class LawyerUpdator
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
            case 'firstname':
                CommonUpdator::UpdateFirstname($model, $value);
                break;
            case 'lastname':
                CommonUpdator::UpdateLastname($model, $value);
                break;
            case 'name':
                CommonUpdator::UpdateName($model, $value);
                break;
            case 'phone':
                CommonUpdator::UpdatePhone($model, $value);
                break;
            case 'email':
                CommonUpdator::UpdateEmail($model, $value);
                break;
            case 'is_primary':
                CommonUpdator::TogglePrimary($model);
                break;
            case 'data':
                CommonUpdator::UpdateData($model, $value);
                break;
            case 'note':
                CommonUpdator::UpdateNote($model, $value);
                break;
            case 'type':
                CommonUpdator::UpdateType($model, $value);
                break;
        }
    }
}
