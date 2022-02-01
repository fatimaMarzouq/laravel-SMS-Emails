<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;
use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\emailCustomer;
use Exception;
use Twilio\Rest\Client;
use App\Models\PredefinedEmails;
use Illuminate\Support\Str;
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
        $account_sid = getenv("TWILIO_SID");
                $auth_token = getenv("TWILIO_TOKEN");
                $twilio_number = getenv("TWILIO_FROM");
        $d =date('Y-m-d H:i:s');
        foreach($customers as $customer){
            
            if($customer->send_sms2!=null && $customer->send_email2!=null && $customer->send_email2<=$d && $customer->send_sms2<=$d && !$customer->email2_sent && !$customer->sms2_sent && !$customer->link_clicked){
                    $receiverNumber = $customer->phone;
            $message = PredefinedEmails::findOrFail(4);
        
            try {
                $client = new Client($account_sid, $auth_token);
                $uniqueID=emailCustomer::create([
                    "email_id" => 4,
                    "customer_id" =>$customer->id,
                ]);
                $link=route('link-clicked',$uniqueID->id);
                $appendedMsg=Str::replace("{link}", $link ,$message->Message);//search on {link} and replace it with the dynamic link
                $client->messages->create($receiverNumber, [
                    'from' => $twilio_number, 
                    'body' => $appendedMsg]);
                Mail::to($customer->email)->send(new HelloEmail(3,$customer->id));
                Customer::where('id',$customer->id)->update(['sms2_sent' => 1,'email2_sent'=>1]);
                // dd('SMS Sent Successfully.'.$uniqueID);
            } catch (Exception $e) {
                dd("Error: ". $e->getMessage());
            }
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
