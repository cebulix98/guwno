<?php

namespace App\Http\Custom\Mail;

use Illuminate\Mail\Mailer;
use Swift_Mailer;
use Swift_SmtpTransport;

class MailTransporter
{


    public function __construct()
    {
    }

    public function BuildTransport($host, $port, $username, $password, $encryption)
    {
        $transport = new Swift_SmtpTransport($host, $port);
        $transport->setUsername($username);
        $transport->setPassword($password);
        $transport->setEncryption($encryption);

        return $transport;
    }

    public function BuildMailer($host, $port, $username, $password, $encryption, $from_email, $from_name)
    {
        $transport = $this->BuildTransport($host, $port, $username, $password, $encryption);
        $swift_mailer = new Swift_Mailer($transport);

        $view = app()->get('view');
        $events = app()->get('events');
        $mailer = new Mailer('',$view, $swift_mailer, $events);

        $mailer->alwaysFrom($from_email, $from_name);
        $mailer->alwaysReplyTo($from_email, $from_name);

        return $mailer;
    }
}
