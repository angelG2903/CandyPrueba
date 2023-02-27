@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <div class="row d-flex justify-content-center mt-4 ">
        <div class="col-10">
            <form>
                <div class="row">
                    <div class="col-sm-12 col-lg-auto">
                        <label for="opciones" class="form-label">Opciones</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <select class="form-select borde" aria-label="Default select example" id="opciones" required>
                            <option selected>Seleccione una opción</option>
                            <option value="1">Pedidos pendientes</option>
                            <option value="2">Pedidos realizados</option>
                        </select>
                    </div>

                    <div class="d-none d-md-block col-md-auto col-lg-auto">
                        <button type="submit" class="btn-blue-boton btn-color-azul">Submit</button>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-12 d-md-none d-flex justify-content-center">
                        <button type="submit" class="btn-blue-boton btn-color-azul">Submit</button>
                    </div>
                </div>


            </form>
        </div>


    </div>

    <!-- pedidos -->
    <div class="row mt-5 d-flex justify-content-center">

        <div class="col-sm-12 col-lg-6">
            <div class="card text-white" style="max-width: 40rem;">
                <div class="card-header tarjeta-color-header">
                    <div class="row">
                        <div class="col-lg-8">Nombre del cliente</div>
                        <div class="col-lg-4 d-lg-flex justify-content-end">Precio</div>
                    </div>
                </div>
                <div class="card-body text-black tarjeta-color-body">
                    <p class="card-text">Número de teléfono</p>
                    <p class="card-text">Sabor</p>
                    <p class="card-text">Relleno</p>
                    <p class="card-text">Rebanadas</p>
                    <p class="card-text">Decoración</p>
                    <p class="card-text">Dirección</p>
                    <div class="row mb-3">
                        <div class="col-8">
                            <p class="card-text">Fecha de entrega:</p>
                        </div>
                        <div class="col-3 ">
                            <p class="card-text">Anticipo</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-8">
                            <p class="card-text">Hora de entrega:</p>
                        </div>
                        <div class="col-3">
                            <p class="card-text">Restan</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection