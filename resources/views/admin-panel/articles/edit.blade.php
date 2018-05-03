@extends('layouts.admin-panel')

@push('head')
<link rel="stylesheet" href="/css/simplemde.min.css">
@endpush

@section('title', 'Edit Article')

@section('content')
<div class="edit-article">
  <form
    action="{{route('admin-panel.articles.update', ['article'=> $article->id])}}"
    method="POST"
    enctype="multipart/form-data">
      {{ method_field('PUT') }}
      <div class="title">
        Title: <input type="text" name="title" value="{{$article->title}}">
      </div>

      <div class="prev-text">
        Preview Text <input type="text" name="prev_text" value="{{$article->prev_text}}">
      </div>

      <div class="prev-img">
          Preview Image <input type="file" name="prev_img">
        <img src="{{'/storage/' . $article->prev_img}}">
      </div>

      <div class="body">
        <textarea name="body" class="simple-mde"></textarea>
      </div>

      <div class="tags">
        Tags
        <select name="tags">
          @foreach($tags as $tag)
          <option value="{{$tag->id}}">{{$tag->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="is-published">
        Is Published
        <input type="radio" name="is_published" value="0"{{!$article->is_published ? ' checked' : ''}}> Unpublished
        <input type="radio" name="is_published" value="1"{{$article->is_published ? ' checked' : ''}}> Published
      </div>

      <button type="submit">Submit</button>
  </form>
</div>
@endsection

@push('script')
<script src="/js/simplemde.min.js"></script>
<script>
  window.onload = function () {
    var xhr = new XMLHttpRequest()
    xhr.addEventListener('load', function () {
      editorConfig.initialValue = this.responseText
      initEditor()
    })
    xhr.open('GET', "{{route('admin-panel.articles.markdown', ['article' => $article->id])}}")
    xhr.send()
  }
</script>
@endpush
