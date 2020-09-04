<?php

namespace App\Http\Controllers\Front;

use App\Services\PostService;

class HomeController extends Controller
{
    protected $postService = null;

    public function __construct(PostService $postService)
    {
        $this->middleware('auth')->except([
            'welcome',
        ]);

        $this->postService = $postService;
    }

    public function home()
    {
        $posts = $this->postService->getAll();

        return view('home', [
            'posts' => $posts,
        ]);
    }

    public function welcome()
    {
        return view('welcome');
    }
}
