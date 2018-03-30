@extends('layouts.base')
@section('content')
  <h2>{{$currentTag->name}}</h2>
  @include('partials.articleList')
@endsection
