<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredefinedEmails;
use App\Models\emailCustomer;
use App\Models\Customer;

class PredefinedEmailsController extends Controller
{
    public function index()
    {
            
        $emails=PredefinedEmails::all();//,compact('emails')
        foreach($emails as $email){
            $sentEmails=emailCustomer::where('email_id',$email->id)->get();
            $count=$sentEmails->count();
            $clickedInSms=0;
            $clickedIn1=0;
            $clickedIn2=0;
            $clickedIn3=0;
            // $sentEmails=emailCustomer::where('email_id',2)->get();            
            foreach($sentEmails as $sentEmail){
                
                $customer=Customer::findOrFail($sentEmail->customer_id);
                
                if($customer->email3_sent && $customer->link_clicked ){
                    $clickedIn3++;
                }else 
                if($customer->email2_sent && $customer->link_clicked && !$customer->email3_sent){
                    $clickedIn2++;
                } else
                if($customer->email1_sent && $customer->link_clicked && !$customer->email2_sent && !$customer->email3_sent){
                    $clickedIn1++;
                }else
                if( $customer->sms_sent && $customer->link_clicked && !$customer->email1_sent && !$customer->email2_sent && !$customer->email3_sent){
                    $clickedInSms++;
                }
               
            }
            // echo '$clickedIn1 '.$clickedIn1."<br>";
            // echo '$clickedIn2 '.$clickedIn2."<br>";
            // echo '$clickedIn3 '.$clickedIn3."<br>";
            // echo '$clickedInSms '.$clickedInSms."<br>";
            $email['clickedIn1']=$clickedIn1?($clickedIn1/$count)*100 : $clickedIn1;
            $email['clickedIn2']=$clickedIn2?($clickedIn2/$count)*100: $clickedIn2;
            $email['clickedIn3']=$clickedIn3?($clickedIn3/$count)*100: $clickedIn3;
            $email['clickedInSms']=$clickedInSms?($clickedInSms/$count)*100 : $clickedInSms;
            $email['count']=$count;
        }
        
        // echo "<pre>";
        // print_r($emails);
        // echo "</pre>";
        return view('pages.emailsList')->with([
            'emails' => $emails,
        ]);
    }
    public function updateView($id){
        $email=PredefinedEmails::findOrFail($id);
        return view('pages.updateEmail',compact('email'));
    }
    public function update(Request $request){
        // return $request->all();
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:255',            
        ]);
        $Email = PredefinedEmails::findOrFail($request->id);
        $Email->subject = $request->subject;
        $Email->Message = $request->message;
        

        $Email->save();
        
        return redirect(route('emails-list'));
    }
    
}
