<?php

namespace App\Http\Controllers;


use App\Mail\HelloEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Customer;
use Exception;
use Twilio\Rest\Client;
use App\Models\PredefinedEmails;
use App\Models\emailCustomer;
use Illuminate\Support\Str;
class CustomerController extends Controller
{
    public function index()
    {
        $customers=Customer::all();
        return view('pages.customersList',compact('customers'));
    }
    public function store(Request $request){
        // return $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'phone:AUTO,JO',
            
        ]);
        // print_r($request);
        
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'company' => $request->company,
            
        ]);
        return redirect(route('customers-list'));
    }
    public function updateView($id){
        $customer=Customer::findOrFail($id);
        return view('pages.updateCustomer',compact('customer'));
    }
    public function update(Request $request){
        // return $request->all();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'phone:AUTO,JO',
            
        ]);
        $Customer = Customer::findOrFail($request->id);
        $Customer->name = $request->name;
        $Customer->email = $request->email;
        $Customer->phone = $request->phone;
        $Customer->position = $request->position;
        $Customer->company = $request->company;

        $Customer->save();
        
        return redirect(route('customers-list'));
    }
    public function deleteView($id){
        $customer=Customer::findOrFail($id);
        return view('pages.deleteCustomer',compact('customer'));
    }
    public function delete(Request $request){
        // return $request->all();
        
        $Customer = Customer::findOrFail($request->id);
        $Customer->delete();
        
        return redirect(route('customers-list'));
    }

    public function invite($id){
        $customer=Customer::findOrFail($id);
        // return view('pages.deleteCustomer',compact('customer'));
        if(!$customer->sms1_sent && !$customer->link_clicked){
            $receiverNumber = $customer->phone;
    $message = PredefinedEmails::findOrFail(4);

    try {

        $account_sid = getenv("TWILIO_SID");
        $auth_token = getenv("TWILIO_TOKEN");
        $twilio_number = getenv("TWILIO_FROM");

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
        Mail::to($customer->email)->send(new HelloEmail(1,$customer->id));
        $d =date('Y-m-d H:i:s');
        Customer::where('id',$customer->id)->update(['sms1_sent' => 1,'email1_sent'=>1,
            'send_email3'=>date('Y-m-d H:i:s', strtotime( $d . " +2 minutes")),
            'send_email2'=>date('Y-m-d H:i:s', strtotime( $d . " +4 minutes")),]);
        // dd('SMS Sent Successfully.'.$uniqueID);
        return redirect(route('customers-list'));
    } catch (Exception $e) {
        dd("Error: ". $e->getMessage());
    }
        }
    }
}
