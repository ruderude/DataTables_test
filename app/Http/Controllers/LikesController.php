<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Repositories\LikeRepository;

class LikesController extends Controller
{
    private $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LikeRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function likes(Request $request)
    {
        return $this->repository->like($request);
    }

}
