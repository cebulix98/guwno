<?php

namespace App\Mail;

use App\Models\Cases\CaseCase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class MailCaseLawyerCaseAssign extends Mailable
{
    use Queueable, SerializesModels;

    protected const VIEW = "mail.mail_case_lawyer_case_assign";
    protected const TITLE = "Prawnicy: Nowa sprawa";

    protected $case_id;
    public $case;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($case_id)
    {
        $this->case_id = $case_id;
        $this->case = CaseCase::find($case_id);
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
                'link' => $this->GetLink()
            ]);

        return $view;
    }

    public function GetLink() {
        $link = URL::route('cases.expanded', ['id' => $this->case_id]);

        return $link;
    }
}
