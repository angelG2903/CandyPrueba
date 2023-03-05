<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bienvenido</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Mis estilos -->
    <link rel="stylesheet" href="../resources/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light color-navbar">
        <div class="container-fluid ">
            <a class="navbar-brand ti ms-1" href="#">Candy Postres</a>
            <a class="navbar-brand text-white" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Iniciar sesión</a>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="row mt-5 mb-5 d-flex justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="{{ Vite::asset('resources/img/Candy.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <img src="{{ Vite::asset('resources/img/Candy.png') }}" alt="" class="img-fluid">
            </div>
            

        </div>
        

    </div>
    <footer class="f"></footer>

</body>
</html>
