<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class AdminModel extends User
{

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
