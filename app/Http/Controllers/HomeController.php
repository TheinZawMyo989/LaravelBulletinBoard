<?php

namespace App\Http\Controllers;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function panel()
    {
        $allNews = $this->newsService->getAllNews();
        $count = $this->newsService->getNewsCount();
        return view('home', compact(['allNews','count']));
    }

}
