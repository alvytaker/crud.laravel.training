<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class UserExcel extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject= "User excel";
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($url)
    {     
       $this->url = $url;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Emails.UserEmails');
    }
}
