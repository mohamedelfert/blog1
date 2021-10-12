<?php

namespace App\Http\Controllers\api;

use App\commentsModel;
use App\Http\Controllers\Controller;
use App\NewsModel;

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
}