<?php

namespace App\Http\Controllers;

use App\Mail\TrialMail;
use Illuminate\Http\Request;
use Mail;
class Trial extends Controller
{
    
    public function index() {
        $params = [
            'title' => 'Trial'
        ];
        return view('request.trial', $params);
    }

    public function sendEmail(Request $request){
        $details = [
            'name'=> $request->name,
            'email'=> $request->email,
            'namaPerusahaan'=> $request->namaPerusahaan,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ];

        Mail::to('dedenkoesuma72@gmail.com')->send(new TrialMail($details));
        return back()->with('success','Berhasil Dikirim');
    }
}
