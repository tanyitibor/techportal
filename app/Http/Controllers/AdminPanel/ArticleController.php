<?php
namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Article;
use App\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('updated_at', 'desc')
            ->simplePaginate(20);

        return view('admin-panel.articles.index', [
            'articles'  => $articles,
        ]);
    }

    public function edit(Article $article)
    {
        $tags = Tag::orderBy('name')->get();

        return view('admin-panel.articles.edit', [
            'article'   => $article,
            'tags'      => $tags,
        ]);
    }

    public function markdown(Article $article)
    {
        return $article->body;
    }
}
