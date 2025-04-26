<?php

namespace App\Actions;

use App\DTO\PostDTO;
use App\Models\Post;
use App\Services\ImageManager;
use DB;

final class CreatePost{

    private $service;

    public function __construct(ImageManager $service)
    {
        $this->service = $service;
    }

    public function handle(PostDTO $dto, string $image_link = null): Post
    {
        return DB::transaction(function() use($dto, $image_link){

            $post = new Post($dto->get());

            if($image_link != null){
                $post->image = $this->service->save($image_link);
            }
            $post->save();

            return $post;
        });
    }
}