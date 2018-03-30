@extends('layouts.base')

@section('title', 'Author ' . $author->name)

@section('content')
<div class="author">
  <h2>Author <i>{{$author->name}}</i></h2>
  @include('partials.articleList')
</div>
@endsection
