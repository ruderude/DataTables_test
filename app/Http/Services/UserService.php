<?php

namespace App\Http\Services;

// use App\Factory\ResponseFactory;
use App\Http\Repositories\UserRepository;
use App\Models\User;

class UserService {

    private const ANSWERED = 1; // 定型文

    private $repository = null;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

}
