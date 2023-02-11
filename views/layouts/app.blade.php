<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
   
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <ul class="navbar-nav me-auto">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                <ul class="navbar-nav ms-auto">
                        <li class="collapse navbar-collapse">
                            <span id="navbarDropdown" class="nav-link dropdown-toggle" 
                            href="#" role="button" data-bs-toggle="dropdown" 
                            aria-haspopup="true" aria-expanded="false" v-pre>
                            </span>

                            </button>
                            <ul class="dropdown-menu">
                                @can('viewany',App\Models\Client::class)
                                <li>
                                    <a class="dropdown-item" href="{{route('clients.index')}}">
                                        Client
                                    </a>
                                </li>
                                @endcan
                                @can('viewany',App\Models\CommandeVente::class)
                                
                                <li class="nav-item dropdown">
                                    <a class="dropdown-item" href="{{route('commandevente.index')}}">
                                        Commandes ventes
                                    </a>
                                </li>
                                @endcan
                                @can('viewany',App\Models\CommandeAchat::class)

                                <li>
                                    <a class="dropdown-item" href="{{route('commandeachat.index')}}">Commande Achat</a>
                                </li>
                                @endcan
                                @can('viewany',App\Models\Produit::class)

                                <li>
                                    <a class="dropdown-item" href="{{route('produit.index')}}">Product</a>
                                </li>
                                @endcan
                                @can('viewany',App\Models\Typeproduit::class)

                                <li>
                                    <a class="dropdown-item" href="{{route('typeproduit.index')}}">Type produit</a>
                                </li>
                                @endcan
                                @can('viewany',App\Models\Fournisseur::class)

                                <li>
                                    <a class="dropdown-item" href="{{route('fournisseur.index')}}">Fournisseur</a>
                                </li>
                                @endcan
                                @can('viewany',App\Models\User::class)

                                <li>
                                    <a class="dropdown-item" href="{{route('utilisateur.index')}}">Utilisateur</a>
                                </li>
                                @endcan

                            </ul>
                            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                            </div>
                        </li>
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name') }}
                        </a>
                </ul>
            </ul>  
           

            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
