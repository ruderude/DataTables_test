<?php

namespace App\Http\Services;

// use App\Factory\ResponseFactory;
use App\Http\Repositories\UserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserService {

    private const ANSWERED = 1; // 定型文

    private $repository = null;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fileUpdate($image, $id)
    {
        $imageName = null;
        // dd($id);
        $now = date("Ymd");
        $num = mt_rand();
        $end = $image->getClientOriginalExtension();
        $imageName = $id . $now . $num . "." . $end;
        // dd($imageName);
        $image->storeAs('public/img/', $imageName);
        return $imageName;
    }

}
