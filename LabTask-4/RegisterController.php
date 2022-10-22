<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    function home(){
        return view("Home");
    }

function register(Request $request)
{
    $this -> validate($request, //the validate 
        [   'name' => 'required | min:10', 
            'pass' => 'required | regex:/[@$!%*#?&]/',
            'id' =>  'required  | digits:6',
            'email' => 'required | string|regex:/(.*)@myemail\.com/i',
             
    ],
        [   'id.digits' => 'Above 6 digit',
            'pass.regex' => 'make sure contain one special character @$!%*#?&',
            'email.regex' => 'email format  (.*)@myemail\.com'
    
    ]);

    $output.='name: '.$request -> name;
    $output.='pass: '.$request -> pass;

    return $output;
}
} 