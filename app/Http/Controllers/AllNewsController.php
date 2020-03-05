<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;

class AllNewsController extends Controller
{
    private $newsService;

    /**
     * Constructor
     */
    public function __construct(NewsServiceInterface $newsService)
    {
        // $this->middleware('auth');
        $this->newsService = $newsService;
    }

    public function index()
    {
        $allNews = $this->newsService->getAllNews();
        return view('welcome', compact('allNews'));
    }
}
