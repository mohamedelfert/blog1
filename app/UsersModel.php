<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersModel extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','username','address','age','email','phone'];
    protected $date = ['deleted_at'];
}
