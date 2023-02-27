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

    <script src="https://kit.fontawesome.com/d153a032a1.js" crossorigin="anonymous"></script>

    <!-- Mis estilos -->
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-white" id="sidebar-wrapper">

                <div class="sidebar-heading border-bottom">
                    <p class="fs-3 my-2 ti">Opciones</p>
                </div>
                <div class="list-group list-group-flush mt-3">

                    <a class="list-group-item  fw-bold" data-bs-toggle="modal" data-bs-target="#registrarP"><i class="fa-solid fa-cake-candles me-2"></i>Registrar Pastel</a>
                    <a class="list-group-item  fw-bold mt-2" data-bs-toggle="modal" data-bs-target="#vela"><i class="bi bi-plus-circle-fill me-2"></i>Registrar Velitas</a>

                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light color-navbar justify-content-between">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-align-left color-icon fs-4 me-3 ms-3" id="menu-toggle"></i>
                            <p class="fs-3 m-0 ti" id="desap">Candy Postres</p>
                        </div>


                        <div class="dropdown me-sm-2 me-lg-3 "> <!-- checar -->

                            <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill"></i>Angel
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('employee') }}"><i class="bi bi-house"></i>Inicio</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-in-right"></i>Cerrar sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>


                </nav>
                <!-- Contenido de la pagina -->
                <main class="py-4">
                    @yield('content')

                </main>

            </div>


        </div>



    </div>
    <!-- <footer></footer> -->


    <script>
        var el = document.getElementById("wrapper");
        var des = document.getElementById("desap"); /* para candy */
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function() {
            el.classList.toggle("toggled");
        };
    </script>

</body>


</html>