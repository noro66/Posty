<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;

class PostPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, Posts $post): bool
    {
        return $post->user_id === $user->id;
    }
}
