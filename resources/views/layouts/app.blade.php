<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aplikasi Kasir</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @livewireStyles
</head>

<body class="bg-dark">
    <div id="app">
        <div class="col">
            <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-md">
                <div class="container-fluid p-0">
                    <a class="navbar-brand" href="{{ url('/') }}">Aplikasi Kasir</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <button class="btn btn-outline-success btn-sm ">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('M a s u k') }}</a>
                                </button>
                            </li>
                            @endif
                                <li class="nav-item text-primary">
                                    --
                                </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <button class="btn btn-outline-info btn-sm ">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('D a f t a r') }}</a>
                                </button>
                            </li>
                            @endif
                            @else
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/checkout">
                                    Riwayat Transaksi
                                </a>
                            </li>
                            <li class="nav-item mx-3">
                                <a class="navbar-brand">
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Keluar</button>
                                </form>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <main class="py-3">
            @yield('content')
        </main>
    </div>

    @yield('scripts')

   {{--  @if (Auth::check())
    <script>
        const audio = new Audio('{{ asset("storage/music.mp3") }}');
        console.log(audio);
        audio.play();
    </script>
    @endif --}}

    @livewireScripts
</body>

</html>