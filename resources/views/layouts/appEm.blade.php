<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Candy Postres') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Mis estilos -->
    <!-- <link rel="stylesheet" href="../resources/css/style.css"> -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light color-navbar ">
            <div class="container-fluid">
                <a class="navbar-brand ti ms-1" href="#">Candy Postres</a>

                <div class="d-flex align-items-center">
                
                    @if (Route::currentRouteName() == 'employee')
                        <a class="icono" data-bs-toggle="modal" data-bs-target="#noti"><i class="bi bi-bell"></i></a>
                            
                    @endif
                
                    <div class="dropdown me-sm-2 me-lg-3 "> <!-- checar -->

                        
                        <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>Angel
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('employee') }}"><i class="bi bi-house"></i>Inicio</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="bi bi-box-arrow-in-right"></i>Cerrar sesión
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                                <!-- <a class="dropdown-item" href="index.php"><i class="bi bi-box-arrow-in-right"></i>Cerrar sesión</a> -->
                            </li>
                        </ul>
                    </div>
                    
                
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            
        </main>
    </div>
    <!-- <footer class="f"></footer> -->
    <footer></footer>

    <script>
        var el = document.getElementById("wrapper");
        var des = document.getElementById("desap"); /* para candy */
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    
</body>


</html>