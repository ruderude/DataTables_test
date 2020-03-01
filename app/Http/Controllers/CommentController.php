<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Http\Repositories\CommentRepository;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    // private $services;
    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CommentRepository $repository)
    {
        $this->middleware('auth');
        // $this->services = $services;
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentRequest $request)
    {
        $data = $request->all();

        $comment = new Comment;
        $comment->user_id = $data['user_id'];
        $comment->post_id = $data['post_id'];
        $comment->body = $data['body'];
        $comment->save();

        return "OK";

        // try{
        //     $this->repository->store($request);
        // }catch(Exception $e){
        //     // todo
        //     // echo "エラー：" . $e->getMessage();
        // }

        // return redirect('/users/'.$request->userId)->with('flash_message', 'コメントを投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
