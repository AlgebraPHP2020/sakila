<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>Videoteka - @yield('title')</title>
          <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/all.min.css') }}" rel="stylesheet">  
    </head>
    <body>
        @section('sidebar')
           <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">Videoteka</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('films.index')}}">Filmovi <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('actors.index')}}">Glumci</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
        @show

        <div class="container">
            @yield('content')
        </div>
          <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    </body>
</html>
