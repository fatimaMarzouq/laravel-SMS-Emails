<?php

namespace App\Http\Controllers;

use App\Mail\HelloEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use App\Models\emailCustomer;
use Exception;
use Twilio\Rest\Client;
use App\Models\PredefinedEmails;
use Illuminate\Support\Str;
class EmailController extends Controller
{
    public function getdeliveries(Request $request)
    {
        $events = json_encode(request()->__get('event-data'));
        $insert = DB::table('email_logs')->insert(
            ['log_type' => 'delivered', 'json' => $events, 'migrated' => FALSE, 'userid' => 0, 'created_at' => Carbon::now()]
        );

        if($insert) {

            return response()->json(['status' => 200]);

        }
        else
        {

            app('log')->debug(request()->all());
            return response()->json(['status' => 404]);

        }

    }
   
    public function sendEmail()
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
        //     if($customer->send_sms<=$d && !$customer->sms_sent && !$customer->link_clicked){
        //         $receiverNumber = $customer->phone;
        // $message = PredefinedEmails::findOrFail(4);
  
        // try {
  
        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");
  
        //     $client = new Client($account_sid, $auth_token);
        //     $uniqueID=emailCustomer::create([
        //         "email_id" => 4,
        //         "customer_id" =>$customer->id,
        //     ]);
        //     $link=route('link-clicked',$uniqueID->id);
        //     $appendedMsg=Str::replace("{link}", $link ,$message->Message);//search on {link} and replace it with the dynamic link
        //     $client->messages->create($receiverNumber, [
        //         'from' => $twilio_number, 
        //         'body' => $appendedMsg]);
  
            
        //     Customer::where('id',$customer->id)->update(["sms_sent" => 1]);
            
        //     dd('SMS Sent Successfully.'.$uniqueID);
        // } catch (Exception $e) {
        //     dd("Error: ". $e->getMessage());
        // }
        //     }
            if($customer->send_email1<=$d && !$customer->email1_sent && !$customer->link_clicked){
                Mail::to($customer->email)->send(new HelloEmail(1,$customer->id));
                Customer::where('id',$customer->id)->update(["email1_sent" => 1]);
            }
            if($customer->send_email2<=$d && !$customer->email2_sent && !$customer->link_clicked){
                Mail::to($customer->email)->send(new HelloEmail(2,$customer->id));
                Customer::where('id',$customer->id)->update(["email2_sent" => 1]);
            }
            if($customer->send_email3<=$d && !$customer->email3_sent && !$customer->link_clicked){
                Mail::to($customer->email)->send(new HelloEmail(3,$customer->id));
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
