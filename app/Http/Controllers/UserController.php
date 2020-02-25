<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\UserRepository;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->repository->index();
        return view('index', ['users' => $users]);
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
        // dd($id);
        $user = $this->repository->show($id);
        $posts = $this->repository->userPosts($id);
        // dd($posts);
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
    public function update(Request $request, $id)
    {
        // dd($request->file('image'));
        $imageName = "";
        if($request->image) {
            $id = $id;
            $now = date("Ymd");
            $num = mt_rand();
            $end = $request->image->getClientOriginalExtension();
            $imageName = $id . $now . $num . "." . $end;
            // dd($imageName);
            $request->image->storeAs('public/img/', $imageName);
        }
        // dd($imageName);

        // 元のファイルを削除
        $oldImageName = "";
        // dd($request->all());
        // dd($request->file('image'));
        $user = $this->repository->show($id);
        // 元のファイル名
        $oldImageName = $user->image;

        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->job = $request->job;
        $user->image = $imageName;
        $user->name = $request->name;
        $user->save();

        if(!is_null($oldImageName) && !is_null($request->image)) {
            Storage::delete('public/img/' . $oldImageName);
        }

        return redirect('users/'.$user->id);
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
