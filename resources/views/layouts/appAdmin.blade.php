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
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/style.css') }}">
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

                    @if (Route::currentRouteName() == 'Dashboard')
                        <a href="{{ route('Inventory') }}" class="list-group-item  fw-bold"><i class="fa-solid fa-cake-candles me-2"></i>Inventario</a>
                        <a href="{{ route('RegisterEmployee') }}" class="list-group-item  fw-bold mt-2"><i class="bi bi-plus-circle-fill me-2"></i>Registrar usuarios</a>
                        <a href="{{ route('Order') }}" class="list-group-item  fw-bold mt-2"><i class="bi bi-plus-circle-fill me-2"></i>Pedidos</a>
                    @endif

                    @if (Route::currentRouteName() == 'Order')
                        <a href="{{ route('Dashboard') }}" class="list-group-item  fw-bold mt-2"><i class="bi bi-box-arrow-in-right me-2"></i>Regresar</a>
                    @endif

                    @if (Route::currentRouteName() == 'Inventory')
                        <a href="{{ route('Dashboard') }}" class="list-group-item  fw-bold mt-2"><i class="bi bi-box-arrow-in-right me-2"></i>Regresar</a>
                    @endif

                    @if (Route::currentRouteName() == 'RegisterEmployee')
                        <a href="{{ route('Dashboard') }}" class="list-group-item  fw-bold mt-2"><i class="bi bi-box-arrow-in-right me-2"></i>Regresar</a>
                    @endif

                    @if (Route::currentRouteName() == 'register')
                        <a href="{{ route('RegisterEmployee') }}" class="list-group-item  fw-bold mt-2"><i class="bi bi-box-arrow-in-right me-2"></i>Regresar</a>
                    @endif

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
                                <i class="bi bi-person-fill"></i>{{Auth::user()->name}}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('Dashboard') }}"><i class="bi bi-house"></i>Inicio</a></li>
                                <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#editarUsuario">Editar perfil</a></li>
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
    <footer class="foo"></footer>

    

    <!-- Modal Editar usuario-->
    <div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: transparent;border: none;">
                <div class="modal-header color-navbar br-modal-top">
                    <h5 class="modal-title" id="exampleModalLabel">Editar perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body color-modal br-modal-bot">

                    <form>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nombre</label>
                            <input type="text" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Teléfono</label>
                            <input type="number" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Correo</label>
                            <input type="email" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="d-flex justify-content-end mt-5 mb-2">
                            <button type="button" class="btn-blue-boton btn-color-rojo me-3" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn-blue-boton btn-color-azul px-3 me-1" data-bs-dismiss="modal">Guardar cambios</button>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

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