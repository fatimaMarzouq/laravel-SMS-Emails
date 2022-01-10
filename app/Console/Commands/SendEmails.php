<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        /** 
         * Store a receiver email address to a variable.
         */
        // $reveiverEmailAddress = "fatima@softylus.com";
        $customers=Customer::all();
        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the 
         * receiver email address.
         * 
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */
        $d =date('Y-m-d H:i:s');
        foreach($customers as $customer){
            if($customer->send_sms<=$d && !$customer->sms_sent && !$customer->link_clicked){
                $receiverNumber = $customer->phone;
        $message = "This is testing message";
  
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
  
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            
            Customer::where('id',$customer->id)->update(["sms_sent" => 1]);
            // dd('SMS Sent Successfully.');
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }
            }
            if($customer->send_email1<=$d && !$customer->email1_sent && !$customer->link_clicked){
                Mail::to($customer->email)->send(new HelloEmail(1));
                Customer::where('id',$customer->id)->update(["email1_sent" => 1]);
            }
            if($customer->send_email2<=$d && !$customer->email2_sent && !$customer->link_clicked){
                Mail::to($customer->email)->send(new HelloEmail(2));
                Customer::where('id',$customer->id)->update(["email2_sent" => 1]);
            }
            if($customer->send_email3<=$d && !$customer->email3_sent && !$customer->link_clicked){
                Mail::to($customer->email)->send(new HelloEmail(3));
                Customer::where('id',$customer->id)->update(["email3_sent" => 1]);
            }
            
        }
        

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
        // if (Mail::failures() != 0) {
        //     return "Email has been sent successfully.";
        // }
        // return "Oops! There was some error sending the email.";
    
    }
    
        
}
