<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class Users extends Controller
{
    public function login(){
        $rules = [
            'email'      =>'required|email',
            'password'   =>'required'
        ];
        $validate = Validator::make(request()->all(),$rules);

//        $validate = $this->validate(request(),
//            [
//                'email'     =>'required|email',
//                'password'  =>'required'
//            ]);
        if ($validate->fails()){
            return response(['status' => false,'message' => $validate->messages()]);
        }else{
            if (auth()->attempt(['email' => request('email'),'password' => request('password')])){
                $user = auth()->user();
                $user->api_token = str_random(60);
                $user->save();
                return response(['status'=>true,'user'=>$user,'token'=>$user->api_token]);
            }else{
                return response(['status'=>true,'message'=>'This Email Or Password Incorrect']);
            }
        }
    }
}