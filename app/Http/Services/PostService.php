<?php

namespace App\Http\Services;

// use App\Factory\ResponseFactory;
use App\Http\Repositories\PostRepository;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostService {

    private const ANSWERED = 1; // 定型文

    private $repository = null;

    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

}
