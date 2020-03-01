<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostRepository {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function store(Request $request,int $id)
    {

        try {
            \DB::beginTransaction();

            $post = new Post;
            $post->user_id = $id;
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            \DB::commit();

        } catch (Exception $e) {

            \DB::rollBack();
            return $e;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function fetchPost($id)
    {
        $post = Post::find($id);
        return $post;
    }


    public function update(Request $request, int $id)
    {
        try {
            \DB::beginTransaction();

            $post = Post::find($id);
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            \DB::commit();
            return "OK";

        } catch (Exception $e) {

            \DB::rollBack();
            return $e;
        }
    }

}
