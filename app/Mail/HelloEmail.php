<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\PredefinedEmails;
class HelloEmail extends Mailable
{
    use Queueable, SerializesModels;
public $email_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->email_id= $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email= PredefinedEmails::findOrFail($this->email_id);
        return $this->from("support@example.com")->view('email-template',compact('email'));
    }
}
