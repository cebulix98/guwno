<?php

namespace App\Http\Traits;

//handle alert messages
trait AlertMessagesTrait
{

    /**
     * get message text from config
     *
     * @param boolean $success
     * @param string $message_success config path
     * @param string $message_fail config path
     * @return string
     */
    public function GetMessage($success, $message_success, $message_fail)
    {
        if ($success) return __($message_success);
        return __($message_fail);
    }

    /**
     * flash messages to view
     *
     * @param boolean $success
     * @param string $message message text
     * @return void
     */
    public function FlashMessages($success, $message)
    {
        $alert_type = 'alert-success';
        if (!$success) $alert_type = 'alert-danger';

        request()->session()->flash($alert_type, $message);
    }

    /**
     * Handle session result messages
     * @param \Illuminate\Http\Request  $request
     * @param boolean $success true if success
     * @param string $message_success message when success
     * @param string $message_fail message when fail
     */
    public function HandleSuccesMessages($request, $success, $message_success, $message_fail)
    {
        if ($success) $request->session()->flash('alert-success', __($message_success));
        else $request->session()->flash('alert-danger', __($message_fail));
    }

    public function GetAjaxSuccessMessage($success, $message_success, $message_fail, $message_refresh_warning)
    {
        if ($success) $message = __($message_success) . " " . __($message_refresh_warning);
        else $message = __($message_fail);
        return $message;
    }
}
