<?php

namespace App\Http\Controllers\Cases\Create;

use App\Http\Controllers\Cases\Manage\CaseManageController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Files\FilesController;
use App\Http\Creators\CaseCreator;
use App\Http\Creators\OrderCreator;
use App\Http\Custom\Parameters;
use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Http\Managers\CaseManager;
use App\Mail\CaseResponseMail;
use App\Mail\MailCaseAdminCaseNew;
use App\Mail\MailCasePetitionerCaseNew;
use App\Models\Cases\CaseCase;
use App\Models\File\FileAsset;
use App\Models\File\FileAssetDirectory;
use App\Models\Motion\Motion;
use App\Models\Motion\MotionField;
use App\Models\Motion\MotionPrice;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CaseCreateController extends Controller
{
    /**
     * add model
     *
     * @param Request $request
     * @return void
     */
    public function Add(Request $request)
    {
        try {
            $model = $this->AddCase($request);
            $success = true;
            request()->session()->flash('alert-success', __('messages.add_success'));
            if (!$request->ajax()) return redirect()->route('admin.cases.expanded', ['id' => $model->id]);
        } catch (Exception $e) {
            $success = false;
            $model = null;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        }

        return redirect()->back();
    }

    /**
     * add model
     *
     * @param Request $request
     * @return void
     */
    public function AddThroughForm(Request $request)
    {
        try {
            $model = $this->AddCase($request);
            $model->UpdateOrigin($request->origin);
            $this->CreateAttachementsFromRequest($model, $request);
            $transaction = $this->CreateOrder($model);
            $transaction_id = ($transaction) ? $transaction->id : null;
            $motion_id = ($model) ? $model->motion_id : null;
            $success = true;
            request()->session()->flash('alert-success', __('messages.add_motion_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_motion_fail'));
        } finally {
            try {
                CaseManager::SendMailToPetitioner($model, $model->petitioner->email, new MailCasePetitionerCaseNew());
                CaseManager::SendMailToAdmin($model, new MailCaseAdminCaseNew($model->id));
            } catch (Exception $e) {
                Log::error($e);
            }
        }

        if (isset($transaction_id)) return redirect()->route('motions.form.payment', ['transaction_id' => $transaction_id]);
        if (isset($motion_id)) return redirect()->route('motions.form.origin.thankyou', ['id' => $motion_id, 'origin' => $request->origin]);
        return redirect()->back();
    }

    /**
     * add case
     *
     * @param Request $request
     * @return CaseCase
     */
    public function AddCase(Request $request)
    {
        $motion = Motion::find($request->motion_id);
        $type_id = ($motion) ? $motion->type_id : null;
        //create case
        $model = CaseCreator::CreateCaseCase($request->motion_id, $request->firstname, $request->lastname, $type_id);
        //create petitioner data
        $person = CaseCreator::CreateCasePerson($model->id, $request->firstname, $request->lastname, $request->phone, $request->email);
        //create motion
        $motion = CaseCreator::CreateCaseMotion($model->id);
        //fill motion
        $this->CreateMotionFields($model->id, $request);
        //addign lawyer
        $model->AutoAssignLawyer();
        //create files
        $motion->CreateRtf();
        $motion->CreatePdf();
        $motion->CreateTxt();

        return $model;
    }

    /**
     * fill motion
     *
     * @param int $case_id
     * @param Request $request
     * @return void
     */
    public function CreateMotionFields($case_id, Request $request)
    {
        $data = $request->all();

        foreach ($data as $key => $row) {
            $field = MotionField::where('code', $key)->first();

            if ($field) {
                CaseCreator::CreateCaseMotionField($case_id, $field->id, $row);
            }
        }
    }

    /**
     * add note to case
     *
     * @param Request $request
     * @return void
     */
    public function AddNote(Request $request)
    {
        try {
            $parent = CaseCase::find($request->id);
            $model = CaseCreator::CreateCaseNote($parent->id, $request->note, Auth::id());
            $success = true;
            request()->session()->flash('alert-success', __('messages.add_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        }

        return redirect()->back();
    }

    /**
     * add note to case
     *
     * @param Request $request
     * @return void
     */
    public function AddLawyer(Request $request)
    {
        try {
            $parent = CaseCase::find($request->id);
            if (!$request->lawyer_id) throw new Exception();
            if (!$parent) throw new Exception();
            CaseManager::CreateCaseLawyer($parent->id, $request->lawyer_id);

            $success = true;
            request()->session()->flash('alert-success', __('messages.add_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        }

        return redirect()->back();
    }

    /**
     * send quick response to user
     *
     * @param Request $request
     * @return void
     */
    public function AddQuickResponse(Request $request)
    {
        try {
            $case = CaseCase::find($request->id);
            $file_id = $case->case_motion->pdf_id;

            $response = CaseCreator::CreateCaseResponse($case->id, Auth::id(), $request->content);
            $attachement = CaseCreator::CreateCaseResponseAttachement($case->id, $file_id, $response->id);

            $attachements = FileAsset::where('id', $file_id)->get();

            Mail::to($case->petitioner->email)
                ->send(new CaseResponseMail($request->content, $attachements, $response));

            $response->MailSent();

            $success = true;
            request()->session()->flash('alert-success', __('messages.send_response_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.send_response_fail'));
        }

        return redirect()->back();
    }

    /**
     * send quick response to user
     *
     * @param Request $request
     * @return void
     */
    public function AddResponse(Request $request)
    {
        $attachements = array();

        try {
            $case = CaseCase::find($request->id);
            $response = CaseCreator::CreateCaseResponse($case->id, Auth::id(), $request->content, null, $request->footer);
            $this->AddResponseAttachements($response, $request, $case);
            $attachements = $response->file_attachements;

            $success = true;
            request()->session()->flash('alert-success', __('messages.send_response_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.send_response_fail'));
        } finally {
            try {
                CaseManager::SendMailToPetitioner($case, $case->petitioner->email, new CaseResponseMail($request->content, $attachements, $response));
                $response->MailSent();
            } catch (Exception $e) {
                Log::error($e);
            }
        }

        return redirect()->back();
    }

    public function AddResponseAttachements(&$response, $request, $case)
    {
        if ($request->response_form_pdf) CaseCreator::CreateCaseResponseAttachement($case->id, $request->response_form_pdf, $response->id);
        if ($request->response_form_rtf) CaseCreator::CreateCaseResponseAttachement($case->id, $request->response_form_rtf, $response->id);
        if ($request->response_motion_pdf) CaseCreator::CreateCaseResponseAttachement($case->id, $request->response_motion_pdf, $response->id);
        if ($request->response_motion_rtf) CaseCreator::CreateCaseResponseAttachement($case->id, $request->response_motion_rtf, $response->id);

        if ($request->attachements) {
            foreach ($request->attachements as $file) {
                CaseCreator::CreateCaseResponseAttachement($case->id, $file, $response->id);
            }
        }

        $directory = FileAssetDirectory::where('code', '=', 'attachements')->first();
        $files = $request->file('files');

        if ($directory != null) {
            $assets = FilesController::UploadFileGenerateNames($files, $directory->id, $directory->path);

            if ($assets)
                foreach ($assets as $asset) {
                    if ($asset) CaseCreator::CreateCaseResponseAttachement($case->id, $asset->id, $response->id);
                }
        }
    }

    /**
     * create order and transaction
     *
     * @param CaseCase $case
     * @return OrderTransaction
     */
    public function CreateOrder($case)
    {
        $motion = $case->motion;
        $transaction = null;

        if ($motion) {
            if (($motion->settings && !$motion->settings->is_free) || !$motion->settings) {
                $price = MotionPrice::where('motion_id', $case->motion_id)->where('origin_id', $case->origin_id)->first();

                $netto = ($price) ? $price->single_price_netto : 9999;
                $total_netto = ($price) ? $price->total_price_netto : 9999;
                $vat_rate = ($price) ? $price->vat_rate : Parameters::VAT_RATE;
                $total_brutto = ($price) ? $price->total_price_brutto : 9999;

                $result_url = route('payment.tpay.result');

                $order = OrderCreator::CreateOrder($case->id, Auth::id(), $case->petitioner->email, $case->petitioner->lastname, $netto, $total_netto, $vat_rate, $total_brutto);
                $title = __('messages.transaction_id') . $order->code;

                $transaction = $order->CreateTransaction($title, $result_url);
            }
        }


        return $transaction;
    }

    public function CreateAttachementsFromRequest($case, $request)
    {
        if ($case) {
            if ($request->exists('attachements_penalty_delay_family_heavy')) {
                $this->CreateAttachements($case, 'attachements_penalty_delay_family_heavy', 'attachements_penalty_delay_family_heavy', $request);
            }

            if ($request->exists('attachements_penalty_delay_family')) {
                $this->CreateAttachements($case, 'attachements_penalty_delay_family', 'attachements_penalty_delay_family', $request);
            }

            if ($request->exists('attachements_penalty_delay_finance')) {
                $this->CreateAttachements($case, ' attachements_penalty_delay_finance', ' attachements_penalty_delay_finance', $request);
            }

            if ($request->exists('attachements_penalty_delay_residence')) {
                $this->CreateAttachements($case, 'attachements_penalty_delay_residence', 'attachements_penalty_delay_residence', $request);
            }

            if ($request->exists('attachements_penalty_delay_mental_illness')) {
                $this->CreateAttachements($case, 'attachements_penalty_delay_mental_illness', 'attachements_penalty_delay_mental_illness', $request);
            }

            if ($request->exists('attachements_penalty_delay_other_illness')) {
                $this->CreateAttachements($case, 'attachements_penalty_delay_other_illness', 'attachements_penalty_delay_other_illness', $request);
            }

            if ($request->exists('attachements_convict_employment')) {
                $this->CreateAttachements($case, 'attachements_convict_employment', 'attachements_convict_employment', $request);
            }

            if ($request->exists('attachements_all')) {
                $this->CreateAttachements($case, 'attachements_all', null, $request);
            }
        }
    }

    public function CreateAttachements($case, $files_request_name, $description_name, $request)
    {
        $files = $request->file($files_request_name);
        $description = ($description_name) ? __('descriptions.' . $description_name) : '';
        CaseManageController::CreateAttachement($case, $files, $description);
    }
}
