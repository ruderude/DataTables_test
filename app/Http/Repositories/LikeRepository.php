<?php

namespace App\Http\Repositories;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeRepository {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function like($request)
    {
        $user_id = Auth::user()->id;
        $post_id = $request->id;
        // return ['id' => $user_id, 'postId' => $post_id];
        $like = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();

        if($like){
            // いいねが存在すれば削除
            $likeCount = Like::where('post_id', $like->post_id)->count();
            $like->delete();
            return $likeCount - 1;

        } else {
            // なければ作成
            $like = new Like;
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();

            $likeCount = Like::where('post_id', $like->post_id)->count();
            return $likeCount;
        }

    }

}
