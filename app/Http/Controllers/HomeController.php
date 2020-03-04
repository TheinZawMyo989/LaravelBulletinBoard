<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\NewsServiceInterface;

class HomeController extends Controller
{
    private $newsService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NewsServiceInterface $newsService)
    {
        $this->middleware('auth');
        $this->newsService = $newsService;
        // $this->middleware('auth', ['except' => ['/']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function panel()
    {
        $allNews = $this->newsService->getAllNews();
        return view('home',compact('allNews'));
    }

    
}
