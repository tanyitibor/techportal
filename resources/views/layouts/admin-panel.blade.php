<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'Home') - Admin Panel</title>
  <link rel="stylesheet" href="/css/admin-panel.css">
  @stack('head')
</head>
<body>
  <div class="container">
    @include('admin-panel.partials.header')
    @yield('content')
  </div>

  @stack('script')
</body>
</html>
