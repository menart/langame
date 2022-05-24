<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index($page = 0, $newsPerPage = 25)
    {
        $newsList = News::all();
        return view('main', ['newsList' => $newsList]);
    }
}
