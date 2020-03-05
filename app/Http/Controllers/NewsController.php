<?php

namespace App\Http\Controllers;

use App\Contracts\Services\NewsServiceInterface;
use Illuminate\Http\Request;
use Validator;
use Image;
use Illuminate\Support\Facades\Response;
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
        if ($files = $request->file('fileUpload')) {
            // $data = $request->input('image');
            $photo = $request->file('fileUpload')->getClientOriginalName();
            $destination = 'images';
            $insert = $request->file('fileUpload')->move($destination, $photo);
         }
        // $image_file = $request->file('fileUpload');
        // $image = Image::make($image_file);
        // Response::make($image->encode('jpeg'));
        $this->newsService->createNews($request,$insert);
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
        
        $validator = $this->upNews($request);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $this->newsService->updateNews($request,$id);
        // dd($id);
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
    public function upNews(Request $request)
    {
        $rules = [
            'title' => 'required',
            'content' => 'required',
            // 'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        return Validator::make($request->all(), $rules);
    }
}
