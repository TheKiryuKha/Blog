<?php

namespace App\Actions;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageManager;
use DB;

final class CreatePost{

    private $service;

    public function __construct(ImageManager $service)
    {
        $this->service = $service;
    }

    public function handle(User $user, array $attr, string $image_link = null): Post
    {
        return DB::transaction(function() use($user, $attr,$image_link){

            $post = new Post($attr);
            $post->user_id = $user->id;
            $post->views = 0;
            $post->likes = 0;
            $post->status = PostStatus::Simple;

            switch($image_link)
            {
                case !null: $post->image = $this->service->save($image_link);
                default:  $post->image = 'default_avatar.png';
            }

            $post->save();

            return $post;
        });
    }
}