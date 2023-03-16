@extends('layouts.appRegister')


@section('content')

<div class="container">

    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-sm-12 col-lg-8">
            <div class="card text-white card-sombra">
                <div class="card-header tarjeta-color-header">
                    <!-- Aqui todo el titulo -->

                    Registrar velita


                    <!-- Aqui termina el titulo -->
                </div>
                <div class="card-body text-black tarjeta-color-body">

                    <!-- Aqui va el formulario -->

                    <form method="POST" action="{{ route('Product.storeC') }}" role="form" enctype="multipart/form-data" class="needs-validation">
                        @csrf

                        @include('register.formC' )
                        @include('register.cantidad')

                        @include('register.botones', ['boton'=>'Guardar'])

                    </form>

                    <!-- Aqui termina -->

                </div>
            </div>
        </div>
    </div>

</div>

@endsection