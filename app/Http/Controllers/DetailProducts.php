<?php

namespace App\Http\Controllers;

use App\Mail\DetailProduct;
use Illuminate\Http\Request;
use Mail;

class DetailProducts extends Controller
{
    public function sendEmail(Request $request){
        $details = [
            'nameProduct'=>$request->nameProduct,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'namaPerusahaan'=>$request->namaPerusahaan,
            'qty'=> $request->qty,
        ];

        Mail::to('hello@onedream.id')->send(new DetailProduct($details));
        return back()->with('success','Berhasil Dikirim');
    }
}
