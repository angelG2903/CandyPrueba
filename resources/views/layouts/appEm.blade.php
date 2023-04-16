<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Candy Postres</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Mis estilos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/style.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-light color-navbar ">
            <div class="container-fluid">
                <a class="navbar-brand ti ms-1" href="#">Candy Postres</a>

                <div class="d-flex align-items-center">
                
                    <!-- @if (Route::currentRouteName() == 'employee')
                        <a class="icono position-relative" data-bs-toggle="modal" data-bs-target="#noti">
                            <i class="bi bi-bell">
                                <span style="font-size: 11px !important;" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    1
                                </span>
                            </i>
                        </a>

                    @endif -->
                
                    <div class="dropdown me-sm-2 me-lg-3 "> <!-- checar -->

                        
                        <button class=" dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-fill"></i>{{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('employee') }}"><i class="bi bi-house"></i>Inicio</a></li>
                            <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editarUsuario"><i class="bi bi-person-fill-gear"></i>Perfil</a></li>
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

    <footer class="f"></footer>


    <div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: transparent;border: none;">
                <div class="modal-header color-navbar br-modal-top">
                    <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body color-modal br-modal-bot">

                    <div class="row mb-2 d-flex justify-content-center align-items-center">   
                        <div class="col-12">
                            <img src="{{ Vite::asset('resources/img/Candy.png') }}" alt="" class="img-fluid">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p><b>Nombre:</b> {{Auth::user()->name}}</p>
                            <p><b>Apellido:</b> {{Auth::user()->last_name}}</p>
                            <p><b>Teléfono:</b> {{Auth::user()->phone_number}}</p>
                            <p><b>Correo:</b> {{Auth::user()->email}}</p>

                            <div class="row">
                                <div class="col-6"></div>
                                <div class="col-6 d-flex justify-content-end">
                                    <a class="btn-blue-boton btn-color-azul" href="{{ route('ProfileC') }}">Editar perfil</a>
                                </div>
                            </div>
                            

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    

    <script>
        var el = document.getElementById("wrapper");
        var des = document.getElementById("desap"); /* para candy */
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>

    @yield('js')
    
</body>


</html>