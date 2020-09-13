<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Charmonman%7CInconsolata%7CRoboto">
        <link rel="stylesheet" href="<?= url("css/bootstrap.min.css");?>">
        <link rel="stylesheet" href="<?= url("css/estilos.css");?>">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg nav-fan-watches">
                <a class="navbar-brand brand-fan-watches" href="{{ route('home.index') }}">FanWatches</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#toggleMobile">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="toggleMobile">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link nav-link-fan-watches" href="{{ route('home.index') }}">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-fan-watches" href="{{ route('noticias.index') }}">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-fan-watches" href="{{ route('marcas.index') }}">Marcas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-fan-watches" href="{{ route('cuidados.index') }}">Cuidados</a>
                        </li>
                        @if(Auth::check() && Auth::user()->isAdmin()) 
                            <li class="nav-item">
                                <a class="nav-link nav-link-fan-watches" href="{{ route('panel.index') }}">Panel</a>
                            </li>
                        @endif
                    </ul>
                </div>
                <div class="d-flex justify-content-end">
                    <ul class="navbar-nav mr-auto align-items-middle">
                        @if(Auth::check())
                            <li class="nav-item align-items-middle">
                                <a class="nav-link d-flex" href="{{ route('auth.logout') }}"><span><i class="material-icons">input</i></span> {{ Auth::user()->email }}</a>
                            </li>
                            @else
                            <li class="nav-item align-items-middle">
                                <a class="nav-link d-flex" href="{{ route('login') }}">Acceder</a>
                            </li>
                            <li class="nav-item align-items-middle">
                                <a class="nav-link d-flex" href="{{ route('registrar') }}">Registrarse</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </header>
        <main>@yield('main')</main>
        <footer class="footer-fan-watches">
            <div class="text-center py-3">© 2018 Copyright:
                <a href="{{ route('home.index') }}" class="brand-fan-watches">FanWatches</a>
            </div>
        </footer>
    </body>
</html>
