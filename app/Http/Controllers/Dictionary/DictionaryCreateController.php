<?php

namespace App\Http\Controllers\Dictionary;

use App\Http\Controllers\Controller;
use App\Http\Creators\DictionaryCreator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DictionaryCreateController extends Controller
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
     * add model
     *
     * @param Request $request
     * @return void
     */
    public function Add(Request $request)
    {
        try {
            $this->AddDictionaryWord($request);
            $success = true;
            request()->session()->flash('alert-success', __('messages.add_success'));
        } catch (Exception $e) {
            Log::error($e);
            $success = false;
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        }

        return redirect()->back();
    }

    /**
     * add dictionary word
     *
     * @param Request $request
     * @return void
     */
    public function AddDictionaryWord(Request $request)
    {
        DictionaryCreator::CreateWord($request->id, $request->all());
    }
}
