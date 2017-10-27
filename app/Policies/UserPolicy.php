<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function deleteuser(User $cuser, User $user){

        return ($cuser->usertype_id === 1) && ($user->id !== $cuser->id);
    }
}
