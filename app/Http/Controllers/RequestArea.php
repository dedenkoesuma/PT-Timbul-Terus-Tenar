<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestArea extends Controller
{
    public function index(){
        $params =[
            'title' => 'Request'
        ];
        return view('request',$params);
        }
}
