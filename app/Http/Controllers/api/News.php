<?php

namespace App\Http\Controllers\api;

use App\commentsModel;
use App\Http\Controllers\Controller;
use App\NewsModel;
use App\Rules\checkExistNews;
use http\Env\Response;
use Illuminate\Support\Facades\Validator;

class News extends Controller
{
    public function all_news(){
        $all_news = NewsModel::withCount('comments')->orderBy('id','desc')->paginate(2);
        return response(['all_news' => $all_news]);
    }

    public function news_with_comment($news_id){
//        $news = NewsModel::with('comments')->find($news_id);
//        $news = NewsModel::find($news_id)->comments()->paginate(10);
//        $news = NewsModel::find($news_id)->comments()->with('news_id')->paginate(10);
        $news = NewsModel::find($news_id);
//        $comments = $news->comments()->paginate(10);
        $comments = commentsModel::where('news_id',$news_id)->paginate(10);
        return !empty($news) ? response(['status' => true,compact('news','comments')]) : response(['status' => false,'message' => 'Sorry An Error Is Found']);
    }

    public function add_comment(){
        $rules = [
            'comment' => 'required',
            'news_id' => ['required','numeric',new checkExistNews()],
        ];
        $validate = Validator::make(request()->all(),$rules);
        if ($validate->fails()){
            return Response(['status' => false,'message' => $validate->messages()]);
        }else{
//            $comment = new commentsModel;
//            $comment->add_by = auth()->user()->id;
//            $comment->news_id = request()->get('news_id');
//            $comment->comment = request()->get('comment');
//            $comment->save();
            $data = request()->except('_token');
            $data['add_by'] = auth()->user()->id;
            commentsModel::create($data);
            return \response(['status' => true,'message' => 'Comment Add Successfully']);
        }
    }
}