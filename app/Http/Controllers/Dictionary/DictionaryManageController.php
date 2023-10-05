<?php

namespace App\Http\Controllers\Dictionary;

use App\Http\Controllers\Controller;
use App\Http\Managers\DictionaryManager;
use App\Models\Dictionary\Dictionary;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DictionaryManageController extends Controller
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
     * remove model
     *
     * @param Request $request
     * @return void
     */
    public function Remove(Request $request)
    {
        try {
            $dictionary = Dictionary::find($request->dictionary_id);
            $model = DictionaryManager::GetOne($dictionary->table_name, $request->id);
            $model->delete();

            request()->session()->flash('alert-success', __('messages.remove_success'));
        } catch (Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.remove_fail'));
        }

        return redirect()->back();
    }

}
