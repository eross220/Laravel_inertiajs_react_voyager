<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;
class MailSender extends Mailable
{
    use Queueable, SerializesModels;

    private $emailParams;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($params)
    {
        //
        $this->emailParams = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $this->from('blacktigerbusinesswork@gmail.com','user')
        ->subject($this->emailParams->subject)
        ->view('mail.testmail')
        ->with(['emailParams' => $this->emailParams]);
       
    }
}
