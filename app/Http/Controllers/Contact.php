<?php

namespace App\Http\Controllers;

Use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class Contact extends Controller
{
    //
    public function index() {
        $params = [
            'title' => 'Contact'
        ];
        return view('contact', $params);
    }

    public function sendEmail(Request $request){
        $details = [
            'name'=> $request->name,
            'email'=> $request->email,
            'subject'=> $request->subject,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ];

        Mail::to('dedenkoesuma72@gmail.com')->send(new ContactMail($details));
        return back()->with('succes','Berhasil Dikirim');
    }
}
