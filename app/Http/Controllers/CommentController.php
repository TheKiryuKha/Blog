<?php

namespace App\Http\Controllers;

use App\Actions\CreateComment;
use App\Actions\DeleteComment;
use App\Actions\EditComment;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CommentController
{
    public function index(): Response
    {
        $comments = Comment::all();
        return response([
            $comments
        ]);
    }

    public function store(CommentRequest $request, CreateComment $action): RedirectResponse
    {
        $action->handle($request->user(), $request->validated());
        return redirect()->back();
    }

    public function edit(Comment $comment): Response  
    {
        return response(status:200);
    }

    public function update(CommentRequest $request, Comment $comment, EditComment $action): RedirectResponse
    {
        $action->handle($comment, $request->validated());
        return redirect()->back();
    }

    public function destroy(Comment $comment, DeleteComment $action): RedirectResponse
    {
        $action->handle($comment);
        return redirect()->back();
    }
}