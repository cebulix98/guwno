<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTestConnection extends Mailable
{
    use Queueable, SerializesModels;

    protected $smtp;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($smtp)
    {
        $this->smtp = $smtp;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.mail_test_connection')
            ->subject('Test połączenia')
            ->with([
                'smtp' => $this->smtp,
            ]);;
    }
}
