<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CaseResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    protected const VIEW = "mail.mail_case_response";
    protected const TITLE = "Prawnicy";

    protected $content;

    protected $attachements;

    protected $response;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content, $attachements, $response)
    {
        $this->content = $content;
        $this->attachements = $attachements;
        $this->response = $response;
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
            ->with([
                'content' => $this->content,
                'response' => $this->response,
            ]);

        $view = $this->AddAttachements($view);


        return $view;
    }

    /**
     * add attachements
     *
     * @param * $view
     * @return void
     */
    public function AddAttachements($view) {
        foreach($this->attachements as $attachement) {
            $view = $view->attachFromStorage($attachement->filename);
        }

        return $view;
    }
}
