<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container page">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ route('main.index') }}"
                        class="nav-link {{ route('main.index') == url()->current() ? 'active' : '' }}"
                        aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ route('tournament.index') }}"
                        class="nav-link {{ route('tournament.index') == url()->current() ? 'active' : '' }}"
                        aria-current="page">Tournaments</a></li>
                <li class="nav-item"><a href="{{route('admin.main.index')}}"
                        class="nav-link {{ route('admin.main.index') == url()->current() ? 'active' : '' }}">For Admins</a></li>
                <li class="nav-item"><a href="#"
                        class="nav-link {{ 'index' == url()->current() ? 'active' : '' }}">FAQs</a></li>
                <li class="nav-item"><a href="#"
                        class="nav-link {{ 'index' == url()->current() ? 'active' : '' }}">About</a></li>
            </ul>
        </header>


        @yield('content')

        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <p class="col-md-4 mb-0 text-muted">© 2023 Company, Inc</p>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="{{ route('main.index') }}" class="nav-link px-2 text-muted">Home</a></li>
                <li class="nav-item"><a href="{{ route('tournament.index') }}" class="nav-link px-2 text-muted">Tournaments</a></li>
                <li class="nav-item"><a href="{{ route('admin.main.index') }}" class="nav-link px-2 text-muted">For Admins</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
            </ul>
        </footer>

    </div>
</body>

</html>
