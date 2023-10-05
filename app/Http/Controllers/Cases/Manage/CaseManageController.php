<?php

namespace App\Http\Controllers\Cases\Manage;

use App\Http\Controllers\Controller;
use App\Http\Creators\CaseCreator;
use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Http\Managers\CaseManager;
use App\Mail\MailCaseLawyerCaseAssign;
use App\Models\Cases\CaseAttachement;
use App\Models\Cases\CaseCase;
use App\Models\Cases\CaseLawyer;
use App\Models\Cases\CaseNote;
use App\Models\File\FileAssetDirectory;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CaseManageController extends Controller
{
    /**
     * add new model
     *
     * @param Request $request
     * @return void
     */
    public function AddAttachement(Request $request)
    {
        $success = false;

        try {
            $directory = FileAssetDirectory::where('code', '=', 'attachements')->first();

            $model = CaseCase::find($request->id);
            $files = $request->file('files');
            CaseManager::UploadAttachements($directory, $model, $files);

            $model->RecordEvent(CaseEventEnum::EVENT_ADD_ATTACHEMENT);

            $success = true;
            request()->session()->flash('alert-success', __('messages.add_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        }

        return redirect()->back();
    }

    public static function CreateAttachement($case, $files, $description) {
        $directory = FileAssetDirectory::where('code', '=', 'attachements')->first();
        CaseManager::UploadAttachements($directory, $case, $files, $description);
        $case->RecordEvent(CaseEventEnum::EVENT_ADD_ATTACHEMENT);
    }

    /**
     * remove file from db and storage
     *
     * @param Request $request
     * @return void
     */
    public function RemoveAttachement(Request $request)
    {
        $success = false;

        try {
            $item_file = CaseAttachement::find($request->id);
            $file = $item_file->file;

            if ($file) Storage::delete($file->name);

            if ($item_file) $item_file->delete();
            if ($file) $file->delete();

            $item_file->case->RecordEvent(CaseEventEnum::EVENT_REMOVE_ATTACHEMENT);

            $success = true;
            request()->session()->flash('alert-success', __('messages.remove_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.remove_fail'));
        }

        return redirect()->back();
    }

    /**
     * delete case
     *
     * @param Request $request
     * @return void
     */
    public function DeleteCase(Request $request)
    {
        try {
            $model = CaseCase::find($request->id);
            $model->delete();

            $model->RecordEvent(CaseEventEnum::EVENT_CANCELLED);

            $success = true;
            request()->session()->flash('alert-success', __('messages.remove_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.remove_fail'));
        }

        return redirect()->back();
    }

    /**
     * delete lawyer
     *
     * @param Request $request
     * @return void
     */
    public function DeleteLawyer(Request $request)
    {
        try {
            $model = CaseLawyer::find($request->id);
            $model->delete();

            $model->case->RecordEvent(CaseEventEnum::EVENT_REMOVE_LAWYER);

            $success = true;
            request()->session()->flash('alert-success', __('messages.remove_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.remove_fail'));
        }

        return redirect()->back();
    }

    /**
     * delete note
     *
     * @param Request $request
     * @return void
     */
    public function DeleteNote(Request $request)
    {
        try {
            $model = CaseNote::find($request->id);
            $model->delete();

            $model->RecordEvent(CaseEventEnum::EVENT_DELETE_NOTE);

            $success = true;
            request()->session()->flash('alert-success', __('messages.remove_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.remove_fail'));
        }

        return redirect()->back();
    }

    /**
     * delete multiple items
     *
     * @param Request $request
     * @return void
     */
    public function DeleteSelected(Request $request)
    {


        try {
            $selected = $request->items;

            if ($selected) {
                foreach ($selected as $item) {
                    $model = CaseCase::find($item);
                    $model->RecordEvent(CaseEventEnum::EVENT_DELETE_CASE);
                    if ($model) $model->delete();
                }
            }

            $success = true;
            request()->session()->flash('alert-success', __('messages.delete_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.delete_fail'));
        }

        return redirect()->back();
    }

    /**
     * change primary lawyer
     *
     * @param Request $request
     * @return void
     */
    public function ChangeLawyer(Request $request)
    {
        try {
            $case = CaseCase::find($request->id);
            if (!$case) throw new Exception();
            if (!Auth::user()) throw new Exception();

            $current_lawyer = CaseLawyer::where('user_id', $request->user_id)->where('case_id', $case->id)->first();
            $next_lawyer = User::where('id', $request->lawyer_id)->first();
            $exists = CaseLawyer::where('user_id', $request->lawyer_id)->where('case_id', $case->id)->first();

            if (!$current_lawyer) throw new Exception();
            if (!$next_lawyer) throw new Exception();
            if ($exists) throw new Exception();

            $current_lawyer->UpdateUser($next_lawyer->id);


            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        } finally {
            try {
                CaseManager::SendMailToPetitioner($case, $next_lawyer->email, new MailCaseLawyerCaseAssign($case->id));
            } catch (Exception $e) {
                Log::error($e);
            }
        }

        return redirect()->back();
    }

    /**
     * swap motion file
     *
     * @param int $id case id
     * @param int $type 1-rtf, 2-pdf
     * @param array $files
     * @return void
     */
    public function SwapMotionVersion($id, $type, $files)
    {
        try {
            $case = CaseCase::find($id);
            if (!$case) throw new Exception();

            if (!$case->case_motion) {
                CaseCreator::CreateCaseMotion($case->id);
                $case->refresh();
            }

            $directory = FileAssetDirectory::where('code', '=', 'motions')->first();
            CaseManager::UploadMotion($directory, $case->case_motion, $files, $type);
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }
    }

    /**
     * swap motion rtf
     *
     * @param Request $request
     * @return void
     */
    public function SwapMotionVersionRtf(Request $request)
    {
        $files = $request->file('files');
        $this->SwapMotionVersion($request->id, 1, $files);
        return redirect()->back();
    }

    /**
     * swap motion pdf
     *
     * @param Request $request
     * @return void
     */
    public function SwapMotionVersionPdf(Request $request)
    {
        $files = $request->file('files');
        $this->SwapMotionVersion($request->id, 2, $files);
        return redirect()->back();
    }

        /**
     * swap motion pdf
     *
     * @param Request $request
     * @return void
     */
    public function SwapMotionVersionTxt(Request $request)
    {
        $files = $request->file('files');
        $this->SwapMotionVersion($request->id, 3, $files);
        return redirect()->back();
    }
}
