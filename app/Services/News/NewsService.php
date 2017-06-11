<?php


namespace App\Services\News;


use App\News;

class NewsService
{
    public function paginateForHomePage()
    {
        return News::latest()->paginate();
    }

    public function paginateForApi()
    {
        return News::latest()->with('category')->paginate();
    }
}