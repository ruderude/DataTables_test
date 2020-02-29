<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Storage;

class CommentRepository {

    public function store(Request $request)
    {
        // トランザクションtodo
        $comment = new Comment;
        $comment->user_id = $request->myId;
        $comment->post_id = $request->postId;
        $comment->body = $request->comment;
        $comment->save();
    }
}
