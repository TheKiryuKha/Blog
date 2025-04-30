<?php

namespace App\Http\Controllers;

use App\Actions\CreatePost;
use App\Actions\DeletePost;
use App\Actions\EditPost;
use App\Actions\ViewPost;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class PostController
{
    public function index(): Response
    {
        return response(status:200);
    }

    public function show(Post $post, ViewPost $action)
    {   
        if(! $post->is_viewed(request()->user())){
            $action->handle(request()->user(), $post);
        }

        return response(200);
    }

    public function create()
    {
        return response(status:200);
    }

    public function store(PostRequest $request, CreatePost $action): RedirectResponse
    {
        $action->handle($request->user(), $request->validated());
        return redirect()->route('posts.index');
    }

    public function edit(Post $post): Response
    {
        return response(status:200);
    }

    public function update(PostRequest $request, Post $post, EditPost $action): RedirectResponse
    {
        $action->handle($post, $request->validated());
        return redirect()->route('posts.index');
    }

    public function destroy(Post $post, DeletePost $action): RedirectResponse
    {
        $action->handle($post);
        return redirect()->route('posts.index');
    }
}