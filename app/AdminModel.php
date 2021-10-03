<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Foundation\Auth\User;

class AdminModel extends User
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
