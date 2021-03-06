<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\PredefinedEmails;
use App\Models\Customer;
use App\Models\emailCustomer;
use Illuminate\Support\Str;
class HelloEmail extends Mailable
{
    use Queueable, SerializesModels;
public $email_id;
public $customer_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id,$customer)
    {
        $this->email_id= $id;
        $this->customer_id= $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email= PredefinedEmails::findOrFail($this->email_id);
        $google=emailCustomer::create([
            "email_id" => $this->email_id,
            "customer_id" =>$this->customer_id,
            "url_id" =>1,
        ]);
        $facebook=emailCustomer::create([
            "email_id" => $this->email_id,
            "customer_id" =>$this->customer_id,
            "url_id" =>2,
        ]);
        $googleLink=route('link-clicked',$google->id);
        $facebookLink=route('link-clicked',$facebook->id);
        // $appendedMsg=Str::replace("{link}", $link ,$email->Message);//search on {link} and replace it with the dynamic link
        return $this->subject($email->subject)->from("mail@laravillagedental.com","Lara Village Dental")->view('email-template')->with([
            'Message' => $email->Message,
            'Subject'=> $email->subject,
            'googleLink'=>$googleLink,
            'facebookLink'=>$facebookLink,
        ]);
    }
}


