<?php

namespace App\Http\Controllers;

class NewsController extends Controller
{
    public function index($page = 0, $newsPerPage = 25)
    {
        return view('main');
    }
}
