<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class AdminPolicy
{
    use HandlesAuthorization;

    public function accessAdmin(User $user)
    {
        return $user->hasRole('Admin');
    }
}