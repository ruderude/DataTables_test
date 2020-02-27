<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repositories\UserRepository;

class HomeController extends Controller
{

    private $repository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $repository)
    {
        // $this->middleware('auth');
        $this->repository = $repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = $this->repository->index();
        return view('index', ['users' => $users]);
    }

}
