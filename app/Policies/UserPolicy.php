<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function viewAny(User $user)
    {
        return $user->name === 'Admin';
    }

}
