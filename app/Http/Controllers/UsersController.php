<?php

namespace App\Http\Controllers;

use App\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function all_users(){
//        $users = UsersModel::orderBy('id','desc')->get();
        $users = UsersModel::orderBy('id','desc')->paginate(5);
//        $users = UsersModel::orderBy('id','desc')->get(['id','username','address']);
        return view('users.all_users',compact('users'));
    }

    public function insert_new(){
        UsersModel::create([
//        UsersModel::firstOrCreate
//        UsersModel::updateOrCreate([
            'username'=>\request('username'),
            'address'=>\request('address'),
            'age'=>\request('age'),
            'email'=>\request('email'),
            'phone'=>\request('phone')
            ]);
//        $user = new UsersModel;
//        $user->username = \request('username');
//        $user->address = \request('address');
//        $user->age = \request('age');
//        $user->email = \request('email');
//        $user->phone = \request('phone');
//        $user->save();
        return back();
    }

    public function delete($id = null){
        //في حاله عمل حذف لواحد فقط
//        $del = UsersModel::find($id);
//        $del->delete();
//        return redirect('users/');

        // في حاله عمل حذف متعدد
        if ($id != null){
            $del = UsersModel::find($id);
            $del->delete();
        }elseif (\request()->has('id')){
            UsersModel::destroy(\request('id'));
        }

        return redirect('users/');
    }
}
