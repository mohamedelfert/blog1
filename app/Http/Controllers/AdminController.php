<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login_get(){
        return view('login_admin');
    }

    public function login_post(){
        $remember = \request()->has('remember')?true:false;
        if (Auth::guard('webAdmin')->attempt(['email' => \request('email'),'password' => \request('password')], $remember)){
            return redirect('admin/path');
        }else{
            return back();
        }
    }
}
