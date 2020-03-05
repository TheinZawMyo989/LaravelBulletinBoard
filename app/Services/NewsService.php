<?php

namespace App\Services;

use App\Contracts\Dao\NewsDaoInterface;
use App\Contracts\Services\NewsServiceInterface;
use Illuminate\Support\Str;

class NewsService implements NewsServiceInterface
{
    private $NewsDao;

    /**
     * Constructor
     *
     * @param NewsDaoInterface $NewsDao
     */
    public function __construct(NewsDaoInterface $NewsDao)
    {
        $this->NewsDao = $NewsDao;
    }

    /**
     * create news
     *
     * @param Request $request
     * @return void
     */
    public function createNews($request,$insert)
    {
        return $this->NewsDao->createNews($request,$insert);

    }

    /**
     * All news
     *
     * @return void
     */
    public function getAllNews()
    {
        return $this->NewsDao->getAllNews();
    }

    /**
     * getNewsById
     *
     * @param [type] $id
     * @return void
     */
    public function getNewsById($id)
    {
        return $this->NewsDao->getNewsById($id);
    }

    /**
     * update news
     */

    public function updateNews($request,$id)
    {
        return $this->NewsDao->updateNews($request,$id);
    }


    /**
     * delete news
     *
     * @param [type] $id
     * @return void
     */
    public function deleteNews($id)
    {
        return $this->NewsDao->deleteNews($id);
    }

    /**
     * change pass
     *
     * @param [type] $request
     * @return void
     */
    public function changePass($request)
    {
        return $this->NewsDao->changePass($request);
    }



}
