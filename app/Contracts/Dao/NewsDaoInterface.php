<?php

namespace App\Contracts\Dao;

interface NewsDaoInterface
{
    public function createNews($request,$insert);
    public function getPublicNews();
    public function getAllNews();
    public function getNewsById($id);
    public function updateNews($request,$id);
    public function deleteNews($id);
    public function changePass($request);
    public function getMyPost();
}

?>