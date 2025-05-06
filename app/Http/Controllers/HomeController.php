<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class HomeController
{
    public function __invoke(): View
    {   
        return view('home', [
            'featured_posts' => Post::getFeaturedPosts(),
            'latest_posts' => Post::getLatestPosts(8)
        ]);
    }
}
