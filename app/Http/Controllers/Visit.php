<?php

namespace App\Http\Controllers;

use App\Mail\VisitMail;
use Illuminate\Http\Request;
use Mail;

class Visit extends Controller
{
    //
    public function index() {
        $params = [
            'title' => 'Visit'
        ];
        return view('request.visit', $params);
    }

    public function sendEmail(Request $request){
        $details = [
            'name'=> $request->name,
            'email'=> $request->email,
            'namaPerusahaan'=> $request->namaPerusahaan,
            'phone'=> $request->phone,
            'message'=> $request->message,
        ];

        Mail::to('dedenkoesuma72@gmail.com')->send(new VisitMail($details));
        return back()->with('success','Berhasil Dikirim');
    }
}
