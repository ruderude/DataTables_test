<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        // Likeモデル作成
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = $id;
        $like->save();

        $post = Post::where('id', $request->post_id)->first();
        $user_id = $post->user_id;
        // dd($post);
        return redirect('/users/' . $user_id);
    }

    public function destroy(Request $request)
    {
        $like = Like::find($request->like_id);
        $postId = $like->post_id;
        $like->delete();

        $post = Post::where('id', $postId)->first();
        $userId = $post->user_id;
        // dd($post);
        return redirect('/users/' . $userId);
    }
}
