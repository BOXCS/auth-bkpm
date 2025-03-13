<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;

class PostPolicy
{
    // Memeriksa izin untuk mengupdate post
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id; // Hanya pemilik post yang bisa mengupdate
    }

    // Memeriksa izin untuk menghapus post
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id; // Hanya pemilik post yang bisa menghapus
    }
}
