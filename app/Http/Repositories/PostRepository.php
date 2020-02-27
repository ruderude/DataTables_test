<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
        $post = new Post;
        $post->user_id = $id;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }


    public function update()
    {

    }

}
