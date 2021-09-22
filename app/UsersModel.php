<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $fillable = ['id','username','address','age','email','phone'];
}
