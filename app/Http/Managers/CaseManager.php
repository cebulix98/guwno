<?php

namespace App\Http\Managers;

use App\Http\Controllers\Files\FilesController;
use App\Http\Creators\CaseCreator;
use App\Http\Custom\Mail\MailSend;
use App\Http\Custom\Parameters;
use App\Http\Custom\Pdf\PdfCreator;
use App\Http\Custom\Pdf\PdfMotion;
use App\Models\Cases\CaseLawyer;
use App\Models\Lawyer\Lawyer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CaseManager
{


    /**
     * toggle multiple lawyers
     *
     * @param int $parent_id
     * @param array $request_ids
     * @return void
     */
    public static function ToggleMultipleLawyers($parent_id, $request_ids)
    {
        $db_lawyers = Lawyer::all();

        foreach ($db_lawyers as $db_lawyer) {
            CaseManager::Togglelawyer($parent_id, $db_lawyer->id, $request_ids);
        }
    }

    /**
     * toggle lawyer
     *
     * @param int $parent_id
     * @param int $model_id
     * @param array $request_ids
     * @return void
     */
    public static function Togglelawyer($parent_id, $model_id, $request_ids)
    {
        $existing_model = CaseLawyer::where('case_id', $parent_id)->where('lawyer_id', $model_id)->first();
        $should_be_created = CommonManager::ToggleModel($model_id, $request_ids, $existing_model);

        if ($should_be_created && !$existing_model) {
            CaseManager::CreateCaseLawyer($parent_id, $model_id);
        }
    }

    /**
     * upload attachements
     *
     * @param FileAssetDirectory $directory
     * @param CaseCase $model
     * @param array $files
     * @return void
     */
    public static function UploadAttachements($directory, $model, $files, $description=null)
    {
        if ($directory != null && $model) {
            $assets = FilesController::UploadFileGenerateNames($files, $directory->id, $directory->path);

            if ($assets)
                foreach ($assets as $asset) {
                    if ($asset) CaseCreator::CreateCaseAttachement($model->id, $asset->id, null, $description);
                }
        }
    }

    public static function CreateCaseLawyer($parent_id, $user_id)
    {
        $exists = CaseLawyer::where('case_id', $parent_id)->where('user_id', $user_id)->first();
        if (!$exists) {
            $is_primary = (CaseLawyer::where('case_id', $parent_id)->where('is_primary', true)->first()) ? false : true;
            $model = CaseCreator::CreateCaseLawyer($parent_id, $user_id, $is_primary);
            $model->case->Assign();
            return $model;
        }
    }

    /**
     * upload attachements
     *
     * @param FileAssetDirectory $directory
     * @param CaseMotion $model
     * @param array $files
     * @return void
     */
    public static function UploadMotion($directory, $model, $files, $type)
    {
        if ($directory != null && $model) {
            $assets = FilesController::UploadFileGenerateNames($files, $directory->id, $directory->path);

            if ($assets)
                foreach ($assets as $asset) {
                    if ($asset) $model->SwapFile($asset->id, $type);
                }
        }
    }

    public static function SendMailToPetitioner($case, $email, $builder)
    {
        if ($case->origin) {
            $smtp = $case->origin->smtp;
            $mailer = MailSend::GetMailer($smtp->id, $smtp->from_name);
            MailSend::Send($mailer, $email, $builder);
        } else {
            Mail::to($email)
                ->send($builder);
        }
    }

    public static function SendMailToAdmin($case, $builder)
    {
        $email = null;
        if ($case->origin) {
            $smtp = $case->origin->smtp;
            $email = $smtp->from_email;
            $mailer = MailSend::GetMailer($smtp->id, $smtp->from_name);
            MailSend::Send($mailer, $email, $builder);
        } else {
            Mail::to(config('mail.from.address'))
                ->send($builder);
        }
    }
}
