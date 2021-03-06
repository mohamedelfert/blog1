<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function login_get(){
        return view('login');
    }

    public function login_post(){
        $remember = \request()->has('remember')? true:false;
        if (auth()->attempt(['name' => \request('name'),'password' => \request('password')], $remember)){
            return redirect('news');
        }else{
            return back();
        }
    }

    public function delete_user($id){
        User::find($id)->delete();
        return back();
    }
}
