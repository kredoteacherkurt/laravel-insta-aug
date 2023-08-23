<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title') </title>

    <!-- Fonts -->
    
    
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- future activity, last week: serch bar - students activity --}}
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        {{-- Homepage --}}
                        <li class="nav-item">
                            <a href="{{ route('index') }}" class="nav-link">
                                <i class="fa-solid fa-home text-dark icon-sm"></i>
                            </a>
                        </li>
                        {{-- Create page --}}
                        <li class="nav-item">
                            <a href="{{ route('post.create') }}" class="nav-link">
                                <i class="fa-solid fa-circle-plus text-dark icon-sm"></i>
                            </a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::user()->avatar)
                                    <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->avatar }}" class="rounded-circle avatar-sm">
                                    @else
                                    <i class="fa-solid fa-circle-user text-dark icon-sm"></i>
                                    @endif
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('admin.users') }}" class="dropdown-item">
                                        <i class="fa-solid fa-user-gear"></i> Admin</a>
                                    <hr>
                                    <a href="{{ route('profile.show', Auth::user()->id) }}" class="dropdown-item">
                                        {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                                        <i class="fa-solid fa-circle-user"></i> Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i>    {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-5">
           <div class="row justify-content-center">
            @if (request()->is('admin/*'))

                <div class="col-3">
                    {{-- admin controls :3rd week --}}
                    <div class="list-group">
                        <a href="{{ route('admin.users') }}" class="list-group-item"><i class="fa-solid fa-users"></i> Users</a>
                        <a href="{{ route('admin.posts') }}" class="list-group-item"><i class="fa-solid fa-newspaper"></i> Posts</a>
                        <a href="{{ route('admin.categories') }}" class="list-group-item"><i class="fa-solid fa-tags"></i> Categories</a>
                    </div>
                </div>
            @endif

                <div class="col-7">
                    @yield('content')
                </div>
           </div>
        </main>
    </div>
</body>
</html>
