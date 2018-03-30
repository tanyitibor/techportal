<div class="site-footer row">
  @foreach ($tags as $tag)
  <a href="{{route('tags.show', ['tag' => $tag['slug']])}}">
    {{$tag['name']}}
  </a>
  @if (!$loop->last)
   |
  @endif
  @endforeach
</div>
