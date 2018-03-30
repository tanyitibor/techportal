<div class="article-list">
  @foreach ($articles as $article)
  <div class="article-prev">
    <div class="title">
      <h3><a href="{{$article->url()}}">{{$article->title}}</a></h3>
    </div>
    <div class="prev">
      <img async src="/storage/{{$article->prev_img_thumb}}"
        alt="{{$article->title}}">
      <p>{{$article->prev_text}}</p>
    </div>
  </div>
  @endforeach
</div>
@include('partials.pagination', ['results' => $articles])
