<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PredefinedEmails;

class PredefinedEmailsController extends Controller
{
    public function index()
    {
        $emails=PredefinedEmails::all();
        return view('pages.emailsList',compact('emails'));
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
