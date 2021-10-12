<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class commentsModel extends Model
{
    protected $fillable = ['id','add_by','news_id','comment'];
    protected $table = 'comments_models';

    public function getUserName(){
        return $this->hasOne(User::class,'id','add_by');
    }

    public function news_id(){
        return $this->hasOne(NewsModel::class,'id','news_id');
    }
}
