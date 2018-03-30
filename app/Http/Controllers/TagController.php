<?php
namespace App\Http\Controllers;

use App\Tag;

class TagController extends Controller
{
    public function show (Tag $tag)
    {
        if (!$tag) {
            return abort(404);
        }

        $articles = $tag->articles()
            ->published()
            ->orderBy('published_at', 'desc')
            ->simplePaginate(10);

        return view('tags.show', [
            'articles'  => $articles,
            'currentTag'=> $tag,
        ]);
    }
}
