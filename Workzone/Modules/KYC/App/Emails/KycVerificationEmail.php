<?php

namespace Modules\KYC\App\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KycVerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_subject;
    public $mail_content; // Rename $mail_message to $mail_content

    public function __construct($mail_content, $mail_subject)
    {
        $this->mail_subject = $mail_subject;
        $this->mail_content = $mail_content; // Update variable name
    }

    public function build()
    {
        return $this->view('kyc::emails.kyc_mail');
    }
}
