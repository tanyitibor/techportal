<?php

namespace App\Http\Controllers;

use App\Article;
use Encore\Admin\Auth\Database\Administrator;

class AuthorController extends Controller
{
    public function show (string $username)
    {
        $author = Administrator::where('username', $username)->first();

        if (!$author) {
            return abort(404);
        }

        $articles = Article::published()
            ->where('author_id', $author->id)
            ->simplePaginate(10);

        return view('authors.show', [
            'author'    => $author,
            'articles'  => $articles,
        ]);
    }
}
