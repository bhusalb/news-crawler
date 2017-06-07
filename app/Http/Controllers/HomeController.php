<?php

namespace App\Http\Controllers;

use App\Services\News\NewsService;

class HomeController extends Controller
{
    protected $newService;

    public function __construct(NewsService $newsService)
    {
        $this->newService = $newsService;
    }

    public function index()
    {
        $news = $this->newService->paginateForHomePage();
        
        return view('home', compact('news'));
    }
}
