<?php
namespace App\Dao;

use App\Contracts\Dao\NewsDaoInterface;
use App\Models\News;
use App\User;
use Illuminate\Support\Facades\Hash;
class NewsDao implements NewsDaoInterface
{
    /**
     * create News
     *
     * @param [type] $request
     * @return void
     */
    public function createNews($request,$insert)
    {
        News::insert([
            'title' => $request->title,
            'content' => $request->content,
            'image' =>$insert,
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => auth()->user()->id,
        ]);
    }

    /**
     * all news
     *
     * @return void
     */
    public function getAllNews()
    {
        return News::select('news.*', 'users.name')
            ->join('users', 'news.user_id', 'users.id')
            ->orderBy('news_id', 'desc')
            ->paginate(6);

    }

    /**
     * get news by id
     *
     * @param [type] $id
     * @return void
     */
    public function getNewsById($id)
    {
        return News::where('news_id', $id)->first();
    }

    /**
     * update news
     *
     * @param [type] $request
     * @param [type] $id
     * @return void
     */
    public function updateNews($request, $id)
    {
        News::where('news_id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * delete news
     *
     * @param [type] $id
     * @return void
     */
    public function deleteNews($id)
    {
        News::where('news_id', $id)->delete();
    }

    public function changePass($request)
    {
        return User::find(auth()->user()->id)
             ->update(['password' => Hash::make($request->new_password)]);
    }
}
