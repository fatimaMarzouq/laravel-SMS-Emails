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
            $clickedInSms1=0;
            $clickedInEmail1=0;
            $clickedInSms2=0;
            $clickedInEmail2=0;
            // $sentEmails=emailCustomer::where('email_id',2)->get();            
            foreach($sentEmails as $sentEmail){
                if($email->id==1 && $sentEmail->link_clicked){
                    $clickedInEmail1++;
                }else if($email->id==2 && $sentEmail->link_clicked){
                    $clickedInSms1++;
                }else if($email->id==3 && $sentEmail->link_clicked){
                    $clickedInEmail2++;
                }else if($email->id==4 && $sentEmail->link_clicked){
                    $clickedInSms2++;
                }
                // $customer=Customer::findOrFail($sentEmail->customer_id);
                
                // if($customer->email2_sent && $customer->link_clicked ){
                //     $clickedInEmail2++;
                // }else 
                // if($customer->sms2_sent && $customer->link_clicked && !$customer->email2_sent){
                //     $clickedInSms2++;
                // } else
                // if($customer->email1_sent && $customer->link_clicked && !$customer->email2_sent && !$customer->email3_sent){
                //     $clickedIn1++;
                // }else
                // if( $customer->sms_sent && $customer->link_clicked && !$customer->email1_sent && !$customer->email2_sent && !$customer->email3_sent){
                //     $clickedInSms++;
                // }
               
            }
            // echo '$clickedIn1 '.$clickedIn1."<br>";
            // echo '$clickedIn2 '.$clickedIn2."<br>";
            // echo '$clickedIn3 '.$clickedIn3."<br>";
            // echo '$clickedInSms '.$clickedInSms."<br>";
            $email['clickedInEmail1']=$clickedInEmail1?($clickedInEmail1/$count)*100 : $clickedInEmail1;
            $email['clickedInSms1']=$clickedInSms1?($clickedInSms1/$count)*100: $clickedInSms1;
            $email['clickedInEmail2']=$clickedInEmail2?($clickedInEmail2/$count)*100: $clickedInEmail2;
            $email['clickedInSms2']=$clickedInSms2?($clickedInSms2/$count)*100 : $clickedInSms2;
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
