<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
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
            'phone' => 'phone:JO',
            
        ]);
        // print_r($request);
        $d =date('Y-m-d H:i:s');
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'company' => $request->company,
            'send_sms'=>date('Y-m-d H:i:s', strtotime( $d . " +1 hours")),
            'send_email1'=>date('Y-m-d H:i:s', strtotime( $d . " +1 days")),
            'send_email2'=>date('Y-m-d H:i:s', strtotime( $d . " +2 days")),
            'send_email3'=>date('Y-m-d H:i:s', strtotime( $d . " +3 days")),
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
            'phone' => 'phone:JO',
            
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
}
