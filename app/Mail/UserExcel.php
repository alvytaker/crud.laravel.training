<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class UserExcel extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $subject= "User excel";
   
    public $url_excel;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct()
    {     
    
       $this->url_excel = Url::temporarySignedRoute('exportarexcel',now()->addDays(1));

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
