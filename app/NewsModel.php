<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsModel extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','desc','add_by','content','status'];
    protected $date = ['deleted_at'];

    public function getUserName(){
        return $this->hasOne(User::class,'id','add_by');
    }
}
