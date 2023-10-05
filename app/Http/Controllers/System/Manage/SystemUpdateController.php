<?php

namespace App\Http\Controllers\System\Manage;

use App\Http\Controllers\Controller;
use App\Http\Creators\SystemCreator;
use App\Http\Enumerators\SystemEnum;
use App\Models\System\SystemResponseFooter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SystemUpdateController extends Controller
{
    /**
     * update system footer
     *
     * @param Request $request
     * @return void
     */
    public function UpdateSystemResponseFooter(Request $request)
    {
        $success = false;

        try {
            $model = SystemResponseFooter::where('code', SystemEnum::SYSTEM_RESPONSE_FOOTER)->first();
            if (!$model) $model = SystemCreator::CreateSystemResponseFooter(SystemEnum::SYSTEM_RESPONSE_FOOTER, true);

            $model->UpdateContent($request->content);

            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }
}
