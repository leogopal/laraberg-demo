<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  {{-- <script src="https://unpkg.com/react@16.8.6/umd/react.development.js"></script>
  <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.development.js"></script> --}}
  <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>
  <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/moment@2.24.0/min/moment.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

  <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>

  <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    @section('navbar')
    <nav uk-sticky class="uk-navbar-container uk-light uk-sticky" uk-navbar>
        <div class="uk-navbar-left">
            <a href="/" class="uk-navbar-item uk-logo">Laraberg Demo</a>
            <ul class="uk-navbar-nav uk-visible@m">
                
                <li class="{{ Request::path() == 'articles' ? 'uk-active' : '' }}">
                    <a href="/articles">Articles</a>
                </li>
                <li class="{{ Request::path() == 'articles/create' ? 'uk-active' : '' }}">
                    <a href="{{ route('articles.create') }}">Create Article</a>
                </li>
            </ul>
        </div>
        <div class="uk-navbar-right">
            {{-- <ul class="uk-navbar-nav uk-visible@m">
                <li>
                    <a href="https://laraberg.io" class="align-icon">
                    <span uk-icon="chevron-left" class="uk-icon"></span>
                    Back to Laraberg.io
                    </a>
                </li>
            </ul> --}}
            <a uk-toggle class="uk-navbar-toggle uk-hidden@m" href="#offcanvas">
                <span class="uk-margin-small-right uk-visible@s">Menu</span><span uk-navbar-toggle-icon></span>
            </a>
        </div>
    </nav>
    @show

    <main class="main">
        @yield('content')  
    </main>

    @section('footer')
    <footer class="footer uk-dark">
        Van Ons &copy; {{ date('Y') }}
    </footer>
    @show
    <div id="offcanvas" uk-offcanvas="mode: slide; overlay: true" class="uk-offcanvas uk-offcanvas-overlay">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-push">
            <button class="uk-offcanvas-close" type="button" uk-close></button>
            <div class="uk-panel flex-column side-nav-panel">
                <ul class="uk-nav uk-nav-default">
                    <li class="uk-nav-header">Menu</li>
                    <li class="uk-nav-divider"></li>
                    <li class="{{ in_array(Request::path(), ['/', 'articles']) ? 'uk-active' : '' }}">
                        <a href="/articles">Articles</a>
                    </li>
                    <li class="{{ Request::path() == 'articles/create' ? 'uk-active' : '' }}">
                        <a href="{{ route('articles.create') }}">Create Article</a>
                    </li>
                </ul>
                <div class="flex-1"></div>
                {{-- <ul class="uk-nav uk-nav-default">
                    <li>
                        <a href="https://laraberg.io" class="align-icon">
                            <span uk-icon="chevron-left" class="uk-icon"></span>
                            Back to Laraberg.io
                        </a>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</body>
</html>