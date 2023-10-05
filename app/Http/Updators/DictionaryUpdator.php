<?php

namespace App\Http\Updators;

use App\Http\Controllers\Files\FilesController;

class DictionaryUpdator
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
                DictionaryUpdator::UpdateName($model, $value);
                break;
            case 'category_id':
                DictionaryUpdator::UpdateCategory($model, $value);
                break;
            case 'path':
                DictionaryUpdator::UpdatePath($model, $value);
                break;
            case 'order':
                CommonUpdator::UpdateOrder($model, $value);
                break;
            case 'description':
                CommonUpdator::UpdateDescription($model, $value);
                break;
            case 'description_short':
                CommonUpdator::UpdateDescriptionShort($model, $value);
                break;
            case 'icon_filename':
                CommonUpdator::UpdateIconFilename($model, $value);
                break;
            case 'type':
                CommonUpdator::UpdateType($model, $value);
                break;
            case 'agreement':
                CommonUpdator::UpdateAgreement($model, $value);
                break;
            case 'is_required':
                DictionaryUpdator::UpdateIsRequired($model, $value);
                break;
            case 'color':
                CommonUpdator::UpdateColor($model, $value);
                break;
            case 'section_id':
                CommonUpdator::UpdateSection($model, $value);
                break;
            case 'tag_id':
                CommonUpdator::UpdateTag($model, $value);
                break;
            case 'filename':
                CommonUpdator::UpdateFilename($model, $value);
                break;
            case 'module_id':
                CommonUpdator::UpdateModule($model, $value);
                break;
            case 'icon':
                CommonUpdator::UpdateIcon($model, $value);
                break;
            case 'url':
                CommonUpdator::UpdateUrl($model, $value);
                break;
            case 'icon':
                CommonUpdator::UpdateSmtp($model, $value);
                break;
        }
    }

    /**
     * update name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateName($model, $value)
    {
        $model->UpdateName($value);
    }

    /**
     * update name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateCategory($model, $value)
    {
        $model->UpdateCategory($value);
    }

    /**
     * update name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateSection($model, $value)
    {
        $model->UpdateSection($value);
    }

    /**
     * update name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateIconPath($model, $value)
    {
        $model->UpdateIconPath($value);
    }

    /**
     * update name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateIconCode($model, $value)
    {
        $model->UpdateIconCode($value);
    }

    /**
     * toggle model required
     *
     * @param * $model
     * @param boolean $value
     * @return void
     */
    public static function UpdateIsRequired($model, $value)
    {
        if (!$model->is_required) $model->ToggleIsRequired(true);
        else $model->ToggleIsRequired(false);
    }

    /**
     * update name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateUrl($model, $value)
    {
        $model->UpdateUrl($value);
    }

    public static function UpdatePath($model, $value)
    {
        $model->UpdatePath($value);
    }

    /**
     * can model be updated
     *
     * @param * $model
     * @return void
     */
    public static function CanBeUpdated($model)
    {
        if ($model->can_edit) return true;
        return false;
    }

    public static function UploadIcon($model, $files)
    {
        $path = $model::ICON_PATH;
        $filename = FilesController::UploadFileOnlyName($files, $path);

        if ($filename) $model->UpdateFilename('storage/' . $filename);
    }
}
