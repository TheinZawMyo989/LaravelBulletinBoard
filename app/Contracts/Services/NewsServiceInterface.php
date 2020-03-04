<?php

namespace App\Contracts\Services;

interface NewsServiceInterface
{
    public function createNews($request);
    public function getAllNews();
    public function getNewsById($id);
    public function updateNews($request,$id);
    public function deleteNews($id);
    public function changePass($request);
}

?>