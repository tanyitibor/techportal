<header class="site-header row header">
  <nav>
    <a href="/" class="logo"><img src="/TP.png" alt="Logo" /></a>
    <label id="menu-toggle-label" for="menu-toggle"></label>
    <input id="menu-toggle" type="checkbox" />
    <div class="icon-menu"></div>
    <ul class="menu">
      <li>
        <a href="{{route('search.index')}}">Search</a>
      </li>
      @foreach ($tags as $tag)
      <li{!!isset($currentTag) && $currentTag->id === $tag['id'] ? ' class="active"' : ""!!}>
        <a href="{{route('tags.show', ['tag' => $tag['slug']])}}">{{$tag['name']}}</a>
      </li>
      @endforeach
    </ul>
  </nav>
</header>
