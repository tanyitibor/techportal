<?php
$featured = Cache::remember('featured', config('cache.expire'), function() {
  return \App\Featured::orderBy('updated_at', 'desc')->limit(6)->get();
});
?>
<div class="featured col-1-4">
  <h3>Featured</h3>
  @foreach ($featured as $feat)
  @if ($loop->index % 2 === 0)
  <div style="overflow: hidden;">
  @endif
  <a href="{{$feat->article()->first()->url()}}">
  <div class="featured-item">
    <div class="prev-img">
      <img async src="/storage/{{$feat->article()->first()->prev_img_thumb}}">
    </div>
    <div class="prev-text">
      {{$feat->article()->first()->title}}
    </div>
  </div>
  </a>
  @if ($loop->index % 2 === 1 || $loop->last)
  </div>
  @endif
  @endforeach
</div>
