@extends('layouts.admin-panel')

@section('title', 'Articles')

@section('content')
<div class="articles">
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Slug</th>
        <th>Is Published</th>
        <th>Published At</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $article)
      @include('admin-panel.partials.articlePreview')
      @endforeach
    </tbody>
  </table>
</div>
@endsection
