<?php

namespace App\DTO;

use App\Enums\PostStatus;
use App\Models\User;

class PostDTO
{
    private $title;
    private $content;
    private $views;
    private $likes;
    private $status;
    private $user_id; 

    public function __construct
    (
        string $title,
        string $content,
        User $user,
        int $views = 0,
        int $likes = 0,
        $status = PostStatus::Simple
    )
    {
        $this->title = $title;
        $this->content = $content;
        $this->views = $views;
        $this->likes = $likes;
        $this->status = $status; 
        $this->user_id = $user->id;
    }

    public function get(): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'views' => $this->views,
            'likes' => $this->likes,
            'status' => $this->status,
            'user_id' => $this->user_id
        ];
    }
}