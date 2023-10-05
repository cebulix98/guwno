<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailCasePetitionerCaseNew extends Mailable
{
    use Queueable, SerializesModels;

    protected const VIEW = "mail.mail_case_petitioner_case_new";
    protected const TITLE = "Twoja Kancelaria";

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view = $this->view($this::VIEW)
            ->subject($this::TITLE)
            ->with([]);

        return $view;
    }
}
