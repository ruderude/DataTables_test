<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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
        $posts = Post::where('user_id', $id)->with('likes')->latest()->paginate(5);
        // $posts = Post::where('user_id', $id)->latest()->get();
        return $posts;
    }

    public function update(Request $request, int $id, $imageName = null)
    {
        // 元のファイル
        $oldImageName = null;

        $user = User::find($id);
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->job = $request->job;
        $user->description = $request->description;

        // 元のファイルがあれば削除
        if(!is_null($imageName)) {
            $oldImageName = $user->image;
            $user->image = $imageName;
            Storage::delete('public/img/' . $oldImageName);
        }
        $user->save();
        return $user;
    }

}
