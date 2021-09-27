<?php

namespace App\Http\Controllers;

use App\NewsModel;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class NewsController extends Controller
{
    public function all_news(){
//        $news = NewsModel::orderBy('id','desc')->get();
//        $news = NewsModel::orderBy('id','desc')->get(['id','title','content']);
        $news         = NewsModel::withTrashed()->orderBy('id','desc')->paginate(10);
        $trashed_news = NewsModel::onlyTrashed()->orderBy('id','desc')->paginate(10);
        return view('news.all_news',compact('news','trashed_news'));
    }

    public function insert_new(){
//        NewsModel::firstOrCreate
//        NewsModel::create([
        $attr = [
            'title'         => trans('news.title'),
            'desc'          => trans('news.desc'),
            'add_by'        => trans('news.add_by'),
            'content'       => trans('news.content'),
            'status'        => trans('news.status')
        ];
        $data = $this->validate(\request(),[
            'title'    => 'required|min:5|max:50',
            'desc'     => 'required',
            'add_by'   => 'required|int',
            'content'  => 'required',
            'status'   => 'required'
        ],[],$attr);

        NewsModel::create($data);
//        session()->put('message','All Data Saved Successfully');
//        session()->flash('message','All Data Saved Successfully');
        session()->push('message',['success' => 'data hase been saved successfully']);

//        NewsModel::updateOrCreate([
//            'username'=>\request('username'),
//            'address' =>\request('address'),
//            'age'     =>\request('age'),
//            'email'   =>\request('email'),
//            'phone'   =>\request('phone')
//            ]);
//        $user = new NewsModel;
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
//        $del = NewsModel::find($id);
//        $del->delete();
//        return redirect('news/');

        // في حاله عمل حذف متعدد
        if ($id != null){
            $del = NewsModel::find($id);
            $del->delete();
        }elseif (\request()->has('restore') and \request()->has('id')){
            NewsModel::whereIn('id',\request('id'))->restore();
        }elseif (\request()->has('forcedelete') and \request()->has('id')){
            NewsModel::whereIn('id',\request('id'))->forceDelete();
        }elseif (\request()->has('delete') and \request()->has('id')){
            NewsModel::destroy(\request('id'));
        }
        return redirect('news/');
    }
}
