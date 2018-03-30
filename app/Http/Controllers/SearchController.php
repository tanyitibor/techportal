<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index (Request $request)
    {
        $payload = [];
        if ($q = $request->input('q')) {

            $articles = Article::published()
                ->orderBy('published_at')
                ->where('title', 'like', '%' . $q . '%');
            $payload['q'] = $q;
            $payload['articles'] = $articles->simplePaginate(10);
        }

        return view('search.index', $payload);
    }
}
