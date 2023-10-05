<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Updators\UserUpdator;
use App\Models\User;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserManageController extends Controller
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
     * update role
     *
     * @param Request $request
     * @return void
     */
    public function UpdateRole(Request $request)
    {
        $user = User::find($request->id);

        $success = false;

        try {
            if ($user == null) throw new Exception();

            UserUpdator::UpdateRole($user, $request->role);
            $user->AdjustRole();
            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }

    public function UpdateAutoAssign(Request $request)
    {
        $user = User::find($request->id);

        $success = false;

        try {
            if ($user == null) throw new Exception();
            $user->ToggleAutoAsign(!$user->is_auto_assigned);
            $success = true;
            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            $success = false;
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }

    public function DeleteUser(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user == null) throw new Exception();
            $user->BeforeDelete();
            $user->delete();
            $success = true;
            request()->session()->flash('alert-success', __('messages.delete_success'));
        } catch (Exception $e) {
            $success = false;
            request()->session()->flash('alert-danger', __('messages.delete_fail'));
        }

        return redirect()->back();
    }

    public function UpdateEmail(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user == null) throw new Exception();

            $validator = Validator::make($request->all(), [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

            $validator->validate();

            $user->UpdateEmail($request->email);

            $success = true;
            request()->session()->flash('alert-success', __('messages.delete_success'));
        } catch (Exception $e) {
            $success = false;
            request()->session()->flash('alert-danger', __('messages.delete_fail'));
        }

        return redirect()->back();
    }

    public function UpdatePassword(Request $request)
    {
        try {
            $user = User::find($request->id);
            if ($user == null) throw new Exception();

            $validator = Validator::make($request->all(), [
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            $validator->validate();

            $user->UpdatePassword($request->password);

            $success = true;
            request()->session()->flash('alert-success', __('messages.delete_success'));
        } catch (Exception $e) {
            $success = false;
            request()->session()->flash('alert-danger', __('messages.delete_fail'));
        }

        return redirect()->back();
    }
}
