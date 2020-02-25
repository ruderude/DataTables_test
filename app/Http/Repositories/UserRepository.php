<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class UserRepository {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('posts')->get();
        return $users;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $user = User::find($id);
        return $user;
    }

    public function userPosts($id)
    {
        // dd($id);
        $posts = Post::where('user_id', $id)->latest()->paginate(5);
        // $posts = Post::where('user_id', $id)->latest()->get();
        return $posts;
    }

}
