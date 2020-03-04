<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;
use Illuminate\Http\Request;
use Validator;

class NewsController extends Controller
{
    private $newsService;

    /**
     * Constructor
     */
    public function __construct(NewsServiceInterface $newsService)
    {
        $this->middleware('auth');
        $this->newsService = $newsService;
    }

    /**
     * show create news page
     * @return void
     */
    public function showCreateNews()
    {
        return view('create_news');
    }

    /**
     * upload news
     * @param $request
     */
    public function createNews(Request $request)
    {
        $validator = $this->validateNews($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->newsService->createNews($request);
        return redirect()->route('home');
    }

    /**
     * show edit news
     *
     * @param [type] $id
     * @return void
     */
    public function showEdit(Request $request, $id)
    {
        $request['id'] = $request->route('id');
        $news = $this->newsService->getNewsById($id);
        return view('edit_news', compact('news'));
    }

    /**
     * update news
     *
     * @param Request $request
     * @return void
     */
    public function updateNews(Request $request,$id){
        $validator = $this->validateNews($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->newsService->updateNews($request,$id);
        return redirect()->route('home');
    }

    public function deleteNews($id)
    {
        $this->newsService->deleteNews($id);
        return redirect()->route('home');
    }
    /**
     * validate news
     */
    public function validateNews(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        return Validator::make($request->all(), $rules);
    }
}
