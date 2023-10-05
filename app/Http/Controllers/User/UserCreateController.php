<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Creators\UserCreator;
use App\Mail\MailUserCreate;
use Dotenv\Exception\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserCreateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware('permissions:musers,can_read');
    }

    /**
     * add model
     *
     * @param Request $request
     * @return void
     */
    public function Add(Request $request)
    {

        $user = null;
        $password = null;

        try {
            $this->validator($request->all())->validate();
            $password =  $this->GeneratePassword();
            $user = $this->AddUser($request, $password);
            $success = true;
            request()->session()->flash('alert-success', __('messages.add_success') . ' Hasło: ' . $password);
        } catch (ValidationException $e) {
            request()->session()->flash('alert-danger', __('messages.validation_fail'));
        } catch (Exception $e) {
            $success = false;
            Log::error($e);
            request()->session()->flash('alert-danger', __('messages.add_fail'));
        } finally {
            if ($user) {
                try {
                    $this->SendMail($user, $password);
                } catch(Exception $e) {
                    Log::error($e);
                    request()->session()->flash('alert-danger', __('messages.email_problems'));
                }
                
            }
        }

        return redirect()->back();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

   /**
     * add user
     *
     * @param Request $request
     * @return void
     */
    public function AddUser(Request $request, string $password)
    {
        if (!$password) throw new Exception();
        $name = $request->lastname . ' ' . $request->firstname;
        $user = UserCreator::CreateUser($name, $request->email, $password, $request->firstname, $request->lastname, $request->role, $request->phone);

        $user->AssignPermissionsFromSchema();

        $user->GenerateInitials();
        $user->GenerateCode();
        $user->Prepare();

        return $user;
    }

    /**
     * send mail with credentials to user
     *
     * @param User $user
     * @param string $password
     * @return void
     */
    public function SendMail($user, $password)
    {
        Mail::to($user->email)
            ->send(new MailUserCreate($user, $password));
    }

    /**
     * generate password
     *
     * @return string
     */
    public function GeneratePassword()
    {
        $password = rand(1000, 9999);
        return $password;
    }
}
