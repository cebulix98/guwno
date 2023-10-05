<?php

namespace App\Http\Controllers\Cases\Manage;

use App\Http\Controllers\Controller;
use App\Http\Updators\CaseUpdator;
use App\Models\Cases\CaseAttachement;
use App\Models\Cases\CaseCase;
use App\Models\Cases\CaseContact;
use App\Models\Cases\CaseHistory;
use App\Models\Cases\CaseLawyer;
use App\Models\Cases\CaseNote;
use App\Models\Cases\CasePerson;
use App\Models\Cases\CaseResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CaseUpdateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * update attribute
     *
     * @param * $model
     * @param * $value
     * @param string $selector
     * @return void
     */
    public function Update($model, $value, $selector, $message_success, $message_fail)
    {
        $success = false;
        if (!$message_success) $message_success = __('messages.update_success');
        if (!$message_fail) $message_fail = __('messages.messages.update_fail');

        try {
            if ($model == null) throw new Exception();
            CaseUpdator::Selector($model, $value, $selector);
            $success = true;
            request()->session()->flash('alert-success', $message_success);
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', $message_fail);
        }
    }

    /**
     * select model
     *
     * @param string $type
     * @param int $id
     * @return *
     */
    public function SelectModel($type, $id)
    {
        switch ($type) {
            case 'case':
                return CaseCase::find($id);
                break;
            case 'case_attachement':
                return CaseAttachement::find($id);
                break;
            case 'case_contact':
                return CaseContact::find($id);
                break;
            case 'case_history':
                return CaseHistory::find($id);
                break;
            case 'case_lawyer':
                return CaseLawyer::find($id);
                break;
            case 'case_note':
                return CaseNote::find($id);
                break;
            case 'case_person':
                return CasePerson::find($id);
                break;
            case 'case_response':
                return CaseResponse::find($id);
                break;
        }
    }

    /**
     * update model
     *
     * @param Request $request
     * @param string $attribute_name
     * @return void
     */
    public function UpdateModel($id, $value, $attribute_name, $model_type, $message_success = null,  $message_fail = null)
    {
        $model = $this->SelectModel($model_type, $id);
        $this->Update($model, $value, $attribute_name, $message_success, $message_fail);
        return redirect()->back();
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseName(Request $request)
    {
        return $this->UpdateModel($request->id, $request->name, 'name', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseMotion(Request $request)
    {
        return $this->UpdateModel($request->id, $request->motion_id, 'motion_id', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseStatus(Request $request)
    {
        return $this->UpdateModel($request->id, $request->status_id, 'status_id', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseFirstname(Request $request)
    {
        return $this->UpdateModel($request->id, $request->firstname, 'firstname', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseLastname(Request $request)
    {
        return $this->UpdateModel($request->id, $request->lastname, 'lastname', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseActive(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'is_active', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseVerify(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'verify', 'case');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseStart(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'start', 'case', __('messages.start_success'));
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseComplete(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'complete', 'case', __('messages.complete_success'));
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseContactType(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'type_id', 'case_contact');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseContactData(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'data', 'case_contact');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseContactPrimary(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'is_primary', 'case_contact');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseContactNote(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'note', 'case_contact');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseLawyerActive(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'is_active', 'case_lawyer');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseNoteNote(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'note', 'case_note');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCasePersonName(Request $request)
    {
        $value = ['firstname'=>$request->firstname, 'lastname'=>$request->lastname];

        return $this->UpdateModel($request->id, $value, 'fullname', 'case_person');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCasePersonFirstname(Request $request)
    {
        return $this->UpdateModel($request->id, $request->firstname, 'firstname', 'case_person');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCasePersonLastname(Request $request)
    {
        return $this->UpdateModel($request->id, $request->lastname, 'lastname', 'case_person');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCasePersonPhone(Request $request)
    {
        return $this->UpdateModel($request->id, $request->phone, 'phone', 'case_person');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCasePersonEmail(Request $request)
    {
        return $this->UpdateModel($request->id, $request->email, 'email', 'case_person');
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateCaseResponseNote(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'note', 'case_response');
    }
    
}
