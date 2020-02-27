<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
    private $services;
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $services ,UserRepository $repository)
    {
        $this->middleware('auth');
        $this->services = $services;
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = $this->repository->index();
        // return view('index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->repository->show($id);
        $posts = $this->repository->userPosts($id);
        return view('user.show', ['user' => $user, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $imageName = null;
        // 画像があれば保存
        $image = $request->image;
        if($image) {
            $imageName = $this->services->fileUpdate($image, $id);
        }

        // 保存
        $user = $this->repository->update($request, $id, $imageName);
        return redirect('/users/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
