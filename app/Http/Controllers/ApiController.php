<?php

namespace App\Http\Controllers;

use App\Services\News\NewsService;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $newService;

    public function __construct(NewsService $newsService)
    {
        $this->newService = $newsService;
    }

    public function getNews(Request $request)
    {
        return $this->newService->paginateForApi();
    }
}
