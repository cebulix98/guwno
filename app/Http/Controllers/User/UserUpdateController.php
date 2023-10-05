<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Creators\UserCreator;
use App\Http\Updators\UserUpdator;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserUpdateController extends Controller
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
    public function Update($model, $value, $selector)
    {
        $success = false;

        try {
            if ($model == null) throw new Exception();
            UserUpdator::Selector($model, $value, $selector);
            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }
    }

    /**
     * select model
     *
     * @param string $type
     * @param int $id
     * @return void
     */
    public function SelectModel($type, $id)
    {
        switch ($type) {
            case 'user':
                return User::find($id);
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
    public function UpdateModel($id, $value, $attribute_name, $model_type)
    {
        $model = $this->SelectModel($model_type, $id);
        $this->Update($model, $value, $attribute_name);
        return redirect()->back();
    }

    /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateName(Request $request)
    {
        return $this->UpdateModel($request->id, $request->value, 'name', 'user');
    }

        /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateFirstname(Request $request)
    {
        return $this->UpdateModel($request->id, $request->firstname, 'firstname', 'user');
    }

        /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdateLastname(Request $request)
    {
        return $this->UpdateModel($request->id, $request->lastname, 'lastname', 'user');
    }

        /**
     * update model
     *
     * @param Request $request
     * @return void
     */
    public function UpdatePhone(Request $request)
    {
        return $this->UpdateModel($request->id, $request->phone, 'phone', 'user');
    }

    public function UpdateNote(Request $request) {
        try {
            $model = User::find($request->id);
            if($model->note) {
                $model->note->UpdateNote($request->note);
            } else {
                UserCreator::CreateUserNote($model->id, $request->note);
            }
            request()->session()->flash('alert-success', __('messages.update_success'));

        } catch(Exception $e) {
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }
}
