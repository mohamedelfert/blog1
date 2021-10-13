<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class checkData
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showData(User $user){
        if ($user->role == 'yes'){
            return true;
        }else{
            return false;
        }
    }
}
