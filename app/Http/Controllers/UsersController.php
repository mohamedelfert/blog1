<?php

namespace App\Http\Controllers;

use App\UsersModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function all_users(){
//        $users = UsersModel::orderBy('id','desc')->get();
//        $users = UsersModel::orderBy('id','desc')->get(['id','username','address']);
        $users         = UsersModel::withTrashed()->orderBy('id','desc')->paginate(10);
        $trashed_users = UsersModel::onlyTrashed()->orderBy('id','desc')->paginate(10);
        return view('users.all_users',compact('users','trashed_users'));
    }

    public function insert_new(){
//        UsersModel::firstOrCreate
//        UsersModel::create([
        $data = $this->validate(\request(),[
            'username' => 'required|min:4|max:10',
            'address'  => 'required',
            'age'      => 'required|int|min:20|max:45',
            'email'    => 'required|email',
            'phone'    => 'required',
        ]);

        UsersModel::create($data);

//        UsersModel::updateOrCreate([
//            'username'=>\request('username'),
//            'address' =>\request('address'),
//            'age'     =>\request('age'),
//            'email'   =>\request('email'),
//            'phone'   =>\request('phone')
//            ]);
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
        }elseif (\request()->has('restore') and \request()->has('id')){
            UsersModel::whereIn('id',\request('id'))->restore();
        }elseif (\request()->has('forcedelete') and \request()->has('id')){
            UsersModel::whereIn('id',\request('id'))->forceDelete();
        }elseif (\request()->has('delete') and \request()->has('id')){
            UsersModel::destroy(\request('id'));
        }
        return redirect('users/');
    }
}
