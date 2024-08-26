<?php

namespace App\Policies;

use App\Models\User;

class ProductPolicy
{
    /**
     * Determine if the given product can be created by the user.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        // Allow creation only if the user has the 'admin' role
        return $user->roles()->where('name', 'admin')->exists();
    }
}
