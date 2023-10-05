<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Custom\Mail\MailTransporter;
use App\Mail\MailTestConnection;
use App\Models\System\ConfigSmtp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SmtpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permissions:madmin,can_read');
    }


    /**
     * show view
     *
     * @return void
     */
    public function index()
    {
        $smtp = ConfigSmtp::all();

        return $this->GetView($smtp);
    }

    /**
     * get view
     *
     * @param array $campaigns
     * @return void
     */
    public function GetView($smtp)
    {
        return view(
            'subpages.system.smtp',
            [
                'smtps' => $smtp,
            ]
        );
    }

    /**
     * add smtp
     *
     * @param Request $request
     * @return void
     */
    public function Add(Request $request)
    {
        $encryption = $request->encryption;
        if ($encryption == "0") $encryption = null;

        $smtp = $this->CreateSmtp($request->host, $request->port, $request->username, $request->password, $encryption, $request->from_email, $request->from_name);
        $success = true;

        if ($success) request()->session()->flash('alert-success', __('messages.create_success'));
        else request()->session()->flash('alert-danger', __('messages.create_fail'));

        return redirect()->back();
    }

    public function Update(Request $request)
    {
        try {
            $smtp = ConfigSmtp::find($request->id);

            if($smtp==null) throw new Exception();

            $encryption = $request->encryption;
            if ($encryption == "0") $encryption = null;

            $smtp->UpdateAll($request->host, $request->port, $request->username, $request->password, $encryption, $request->from_email, $request->from_name);

            request()->session()->flash('alert-success', __('messages.update_success'));
        } catch (Exception $e) {
            request()->session()->flash('alert-danger', __('messages.update_fail'));
        }

        return redirect()->back();
    }

    public function Delete(Request $request) {
        try {
            $smtp = ConfigSmtp::find($request->id);
            $smtp->delete();

            request()->session()->flash('alert-success', __('messages.delete_success'));
        } catch (Exception $e) {
            request()->session()->flash('alert-danger', __('messages.delete_fail'));
        }

        return redirect()->back();
    }

    /**
     * create smtp
     *
     * @param string $host
     * @param string $port
     * @param string $username
     * @param string $password
     * @param string $encryption
     * @param string $from_email
     * @param string $from_name
     * @return ConfigSmtp
     */
    public function CreateSmtp($host, $port, $username, $password, $encryption, $from_email, $from_name)
    {
        $smtp = ConfigSmtp::create([
            'host' => $host,
            'port' => $port,
            'username' => $username,
            'password' => $password,
            'encryption' => $encryption,
            'from_email' => $from_email,
            'from_name' => $from_name,
            'is_verified' => 0
        ]);

        return $smtp;
    }

    /**
     * test smtp connection
     *
     * @param Request $request
     * @return void
     */
    public function TestConnection(Request $request)
    {
        $id = $request->id;

        $smtp = ConfigSmtp::find($id);

        $success = $this->CheckSmtpConnection($smtp);

        if ($success) request()->session()->flash('alert-success', __('messages.smtp_connection_success'));
        else request()->session()->flash('alert-danger', __('messages.smtp_connection_fail'));

        return response()->json(array('result' => $success, 'smtp' => $smtp), 200);
    }

    /**
     * check smtp connection
     *
     * @param ConfigSmtp $smtp
     * @return void
     */
    public function CheckSmtpConnection($smtp)
    {
        if ($smtp != null) {
            try {
                $transporter = new MailTransporter();
                $mailer = $transporter->BuildMailer($smtp->host, $smtp->port, $smtp->username, $smtp->password, $smtp->encryption, $smtp->from_email, $smtp->from_name);

                $mailer->to($smtp->from_email)->send(new MailTestConnection($smtp));
                $smtp->Verify(true);
                return true;
            } catch (Exception $e) {
                $smtp->Verify(false);
                Log::error($e);
                return false;
            }
        }
    }
}
