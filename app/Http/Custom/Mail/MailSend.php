<?php

namespace App\Http\Custom\Mail;

use App\Models\System\ConfigSmtp;
use Illuminate\Support\Facades\Mail;

//job - send mail - wysyłka maili
class MailSend
{

    /**
     * message id
     *
     * @var int
     */
    protected $message_id;

    /**
     * mail instance
     *
     * @var Mail
     */
    protected $mail;

    /**
     * constructor
     *
     * @param int $message_id
     * @param Mail $mail mail instance
     */
    public function __construct($message_id, $mail)
    {
        $this->message_id = $message_id;
        $this->mail = $mail;
    }

    /**
     * get custom mailer
     *
     * @param int $smtp_id
     * @return \Illuminate\Mail\Mailer
     */
    public static function GetMailer($smtp_id, $from_name) {
        $smtp = ConfigSmtp::find($smtp_id);
        $transporter = new MailTransporter();
        $mailer = $transporter->BuildMailer($smtp->host, $smtp->port, $smtp->username, $smtp->password, $smtp->encryption, $smtp->from_email, $from_name);

        return $mailer;
    }

    public static function Send($mailer, $email, $builder) {
        $mailer->to($email)->send($builder);
    }
}
