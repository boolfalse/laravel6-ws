<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    public function generatePublicId(): string
    {
        $public_id = substr(md5(mt_rand()), 0, 12);

        return $public_id;
    }

    public function getAll()
    {
        $posts = Post::all();

        return $posts;
    }
}
