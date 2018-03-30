@extends('layouts.base')

@section('title', isset($q) ? "Results: \"{$q}\"" : 'Search')

@section('content')
<div class="search row">
@if(isset($q))
<h2>Search "{{$q}}"</h2>
@include('partials.articleList')
@else
<h2 class="center">Search</h2>
<form action="{{route('search.index')}}" method="GET">
  <input type="text" name="q" placeholder="Keyword">
  <button class="btn solid blue">Search</button>
</form>
@endif
</div>
@endsection
