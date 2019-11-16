<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'More Corp') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
</head>

<body>
<div id="app">

    @if(!Auth::check() || Auth::user()->type == 0)

        @include('layouts.visitor-nav')
        <main class="mt-4 w-75 mx-auto">
            @yield('content')
        </main>

    @elseif(Auth::user()->type == 1)
        @include('layouts.nav')

        <div class="container-fluid">
            <div class="row">
                <nav class="col-md-2 d-none d-md-block mt-xl-5 bg-light sidebar">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="/dashboard">
                                    <span data-feather="home"></span>
                                    Dashboard <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                    <span data-feather="shopping-cart"></span>
                                    Products
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/products">View</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="/products/create">Create</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                    @yield('content')
                </main>
            </div>
        </div>

    @endif

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.6/holder.js"></script>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>

@yield('js')

</body>
</html>
