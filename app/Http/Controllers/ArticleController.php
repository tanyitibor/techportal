<?php
namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    public function showShort (Article $article)
    {
        if (!$article || !$article->is_published) {
            abort(404);
        }

        return redirect()->route('articles.show', [
            'article'   => $article->id,
            'slug'      => $article->slug
        ]);
    }

    public function show (Article $article)
    {
        if (!$article || !$article->is_published) {
            abort(404);
        }

        return view('articles.show', [
            'article' => $article,
        ]);
    }
}
