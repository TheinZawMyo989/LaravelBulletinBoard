<?php

namespace App\Contracts\Dao;

interface NewsDaoInterface
{
    public function createNews($request);
    public function getAllNews();
    public function getNewsById($id);
    public function updateNews($request,$id);
    public function deleteNews($id);
}

?>