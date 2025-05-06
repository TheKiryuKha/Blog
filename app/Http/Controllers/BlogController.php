<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController
{
    public function __invoke()
    {

        return view('blog', [
            'latest_posts' => Post::getLatestPosts(10)
        ]);
    }
}
