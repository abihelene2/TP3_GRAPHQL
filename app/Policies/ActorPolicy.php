<?php

namespace App\Policies;

use App\Models\User;

class ActorPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function create(User $user) : bool
    {
        $is_admin = false;
        if($user->role_id == 1)
        {
            return $is_admin;
        }
        else if($user->role_id == 2)
        {
            $is_admin = true;
            return $is_admin;
        }
    }
}
