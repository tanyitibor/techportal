<?php
$tags = Cache::remember('menu-tags', config('cache.expire'), function () {
  return App\MenuTag::all()->map(function ($menuTag) {
    return $menuTag->tag()->first();
  })->toArray();
});
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'Home ') | {{env('APP_NAME')}}</title>
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>
  @include('partials.header')
  <div class="container">
    <div class="inner-container">
      <div class="content col-3-4">
        @yield('content')
      </div>
      @include('partials.featured')
    </div>
  </div>
  @include('partials.footer')
</body>
</html>
