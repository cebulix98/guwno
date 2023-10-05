<?php

namespace App\Http\Updators;



class CaseUpdator
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
            case 'verify':
                CommonUpdator::Verify($model, $value);
                break;
            case 'name':
                CommonUpdator::UpdateName($model, $value);
                break;
            case 'motion_id':
                $model->UpdateMotion($value);
                break;
            case 'start':
                CommonUpdator::Start($model, $value);
                break;
            case 'complete':
                CommonUpdator::Complete($model, $value);
                break;
            case 'is_active':
                CommonUpdator::ToggleActive($model, $value);
                break;
            case 'type':
                CommonUpdator::UpdateType($model, $value);
                break;
            case 'status_id':
                CommonUpdator::UpdateStatus($model, $value);
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
            case 'phone':
                CommonUpdator::UpdatePhone($model, $value);
                break;
            case 'email':
                CommonUpdator::UpdateEmail($model, $value);
                break;
            case 'fullname':
                CommonUpdator::UpdatePersonFullname($model, $value);
                break;
        }
    }
}
