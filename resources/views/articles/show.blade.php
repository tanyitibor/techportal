@extends('layouts.base')

@section('title', $article->title)

@section('content')
<article class="article">
  <header>
    <div class="title">
      <h1>{{$article->title}}</h1>
    </div>
    <div class="preview-img">
      <img src="/storage/{{$article->prev_img}}" alt="">
    </div>
  </header>
  <main class="body">{!!$article->bodyHtml()!!}</main>
  <footer>
    <div class="row">
      <div class="tags float-left">
        Tags:
        @foreach ($article->tags()->get() as $tag)
        <span>
          <a href="{{route('tags.show', ['tag' => $tag->slug])}}">
            {{$tag->name}}
          </a>
        </span>
        @if (!$loop->last)
         |
        @endif
        @endforeach
      </div>
      <div class="author float-right">
        Author: <a href="{{route('authors.show', [
          'username'=> $article->author()->first()->username
          ])}}">
          {{$article->author()->first()->username}}
        </a>
      </div>
    </div>
    <div class="row">
      <div class="float-right">
        <i>Published: {{$article->published_at}}</i>
      </div>
    </div>
  </footer>
</article>
@endsection
