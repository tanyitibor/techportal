<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $articles = Article::published()
            ->orderBy('published_at', 'desc')
            ->simplePaginate(10);

        return view('home', [
            'articles' => $articles,
        ]);
    }
}
