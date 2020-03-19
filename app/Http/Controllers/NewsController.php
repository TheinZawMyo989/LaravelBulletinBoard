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
        if ($request->file('fileUpload')) {
            $photo = $request->file('fileUpload')->getClientOriginalName();
            $destination = 'storage/images';
            $insert = $request->file('fileUpload')->move($destination, $photo);
        }
        $this->newsService->createNews($request, $insert);
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
    public function updateNews(Request $request, $id)
    {

        $validator = $this->upNews($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->newsService->updateNews($request, $id);
        return redirect()->route('home');
    }

    /**
     * delete news
     *
     * @param [type] $id
     * @return void
     */
    public function deleteNews($id)
    {
        $this->newsService->deleteNews($id);
        return redirect()->route('home');
    }

    /**
     * My Post
     *
     * @return void
     */
    public function myPost()
    {
        $myPost = $this->newsService->getMyPost();
        $count = $this->newsService->getMyPostCount();
        return view('my_post', compact(['myPost', 'count']));
    }
    /**
     * validate news
     */
    public function validateNews(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        return Validator::make($request->all(), $rules);
    }

    /**
     * upnews validate
     */
    public function upNews(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
        ];
        return Validator::make($request->all(), $rules);
    }
}
