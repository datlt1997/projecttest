<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class emailConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $emailconfirm
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(emailConfirmation $emailconfirm)
    {
        $this->emailconfirm = $emailconfirm;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.sendmail');
    }
}
