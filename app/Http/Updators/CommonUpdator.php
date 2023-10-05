<?php

namespace App\Http\Updators;

use App\Http\Controllers\Files\FilesController;

class CommonUpdator
{

    /**
     * update attribute name
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
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateTimeExecution($model, $value)
    {
        $model->UpdateTimeExecution($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateDescription($model, $value)
    {
        $model->UpdateDescription($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateDescriptionShort($model, $value)
    {
        $model->UpdateDescriptionShort($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateDescriptionLong($model, $value)
    {
        $model->UpdateDescriptionLong($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateIntroduction($model, $value)
    {
        $model->UpdateIntroduction($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateWelcomeMessage($model, $value)
    {
        $model->UpdateWelcomeMessage($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateInvitation($model, $value)
    {
        $model->UpdateInvitation($value);
    }

    /**
     * update attribute
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
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateType($model, $value)
    {
        $model->UpdateType($value);
    }


    /**
     * update attribute
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
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateStatus($model, $value)
    {
        $model->UpdateStatus($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateContractor($model, $value)
    {
        $model->UpdateContractor($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateTimeDeadline($model, $value)
    {
        $model->UpdateTimeDeadline($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateNote($model, $value)
    {
        $model->UpdateNote($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateQuantity($model, $value)
    {
        $model->UpdateQuantity($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function ToggleActive($model, $value)
    {
        $model->ToggleActive(!$model->is_active);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function ToggleHasFullpage($model, $value)
    {
        $model->ToggleHasFullpage(!$model->has_fullpage);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function TogglePrimary($model)
    {
        $model->TogglePrimary(!$model->is_primary);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function ToggleAvailable($model)
    {
        $model->ToggleAvailable(!$model->is_primary);
    }

    /**
     * update attribute name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateShortname($model, $value)
    {
        $model->UpdateShortname($value);
    }

    /**
     * update attribute name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateFullname($model, $value)
    {
        $model->UpdateShortname($value);
    }

    /**
     * update attribute name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateFirstname($model, $value)
    {
        $model->UpdateFirstname($value);
    }

    /**
     * update attribute name
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateLastname($model, $value)
    {
        $model->UpdateLastname($value);
    }


    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateData($model, $value)
    {
        $model->UpdateData($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateOrder($model, $value)
    {
        $model->UpdateOrder($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateEmail($model, $value)
    {
        $model->UpdateEmail($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdatePhone($model, $value)
    {
        $model->UpdatePhone($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateTimeDuration($model, $value)
    {
        $model->UpdateTimeDuration($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateAddress($model, $value)
    {
        $model->UpdateAddress($value);
    }


    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateDateStart($model, $value)
    {
        $model->UpdateDateStart($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateTimeStart($model, $value)
    {
        $model->UpdateTimeStart($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateTimeEnd($model, $value)
    {
        $model->UpdateTimeEnd($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateDateVisible($model, $value)
    {
        $model->UpdateDateVisible($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateContent($model, $value)
    {
        $model->UpdateContent($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateTranscript($model, $value)
    {
        $model->UpdateTranscript($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateSubtitle($model, $value)
    {
        $model->UpdateSubtitle($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function Verify($model, $value)
    {
        $model->Verify($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function Start($model, $value)
    {
        $model->Start($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function Complete($model, $value)
    {
        $model->Complete($value);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param string $value
     * @return void
     */
    public static function UpdateAuthor($model, $value)
    {
        $model->UpdateAuthor($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateDateExpire($model, $value)
    {
        $model->UpdateDateExpire($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateIcon($model, $value)
    {
        $model->UpdateIcon($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateIconFilename($model, $value)
    {
        $model->UpdateIconFilename($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateAgreement($model, $value)
    {
        $model->UpdateAgreement($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateMainPhoto($model, $value)
    {
        $model->UpdateMainPhoto($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateStreamUrl($model, $value)
    {
        $model->UpdateStreamUrl($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateStreamMeetingUrl($model, $value)
    {
        $model->UpdateStreamMeetingUrl($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateColor($model, $value)
    {
        $model->UpdateColor($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function Close($model, $value)
    {
        $model->Close($value);
    }

    /**
     * upload thumbnail
     *
     * @param * $file
     * @param * $model
     * @return void
     */
    public static function UploadMainPhoto($file, $model)
    {
        $asset = FilesController::UploadFileWithDirectoryCode($file, 'thumbnails');
        if ($asset != null) $model->UpdateMainPhoto($asset->id);
    }

    /**
     * upload icon
     *
     * @param * $file
     * @param * $model
     * @return void
     */
    public static function UploadIcon($file, $model)
    {
        $asset = FilesController::UploadFileWithDirectoryCode($file, 'gallery');
        if ($asset != null) $model->UpdateIcon($asset->id);
    }

    /**
     * upload thumbnail
     *
     * @param * $file
     * @param CourseAsset $model
     * @return void
     */
    public static function UploadThumbnail($file, $model)
    {
        $asset = FilesController::UploadFileWithDirectoryCode($file, 'thumbnails');
        if ($asset != null) $model->UpdateThumbnail($asset->id);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateTag($model, $value)
    {
        $model->UpdateTag($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateFilename($model, $value)
    {
        $model->UpdateFilename($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateModule($model, $value)
    {
        $model->UpdateModule($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateRatio($model, $value)
    {
        $model->UpdateRatio($value);
    }

    /**
     * update model
     *
     * @param * $model
     * @param array $value
     * @return void
     */
    public static function UpdatePersonFullname($model, $value)
    {
        $firstname = ($value && isset($value['firstname'])) ? $value['firstname'] : null;
        $lastname = ($value && isset($value['lastname'])) ? $value['lastname'] : null;

        CommonUpdator::UpdateFirstAndLastname($model, $firstname, $lastname);
    }

    /**
     * update model
     *
     * @param * $model
     * @param string $firstname
     * @param string $lastname
     * @return void
     */
    public static function UpdateFirstAndLastname($model, $firstname, $lastname)
    {
        CommonUpdator::UpdateFirstname($model, $firstname);
        CommonUpdator::UpdateLastname($model, $lastname);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateUrl($model, $value)
    {
        $model->UpdateUrl($value);
    }

    /**
     * update attribute
     *
     * @param string $value
     * @return void
     */
    public static function UpdateSmtp($model, $value)
    {
        $model->UpdateSmtp($value);
    }
}
