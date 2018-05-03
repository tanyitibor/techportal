<header class="site-header row header">
  <nav>
    <ul class="menu">
      <li>
        <a href="{{route('admin-panel.articles.index')}}">Articles</a>
      </li>
      {{--
      @foreach ($tags as $tag)
      <li{!!isset($currentTag) && $currentTag->id === $tag['id'] ? ' class="active"' : ""!!}>
        <a href="{{route('tags.show', ['tag' => $tag['slug']])}}">{{$tag['name']}}</a>
      </li>
      @endforeach
      --}}
    </ul>
  </nav>
</header>
