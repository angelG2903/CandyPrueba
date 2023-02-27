@extends('layouts.appEm')

@section('content')
<div class="container">

        <div class="row mb-4 d-flex justify-content-start">

            <div class="col-sm-12 col-lg-6 mt-4">
                <div class="card text-white" style="max-width: 30rem;">
                    <div class="card-header tarjeta-color-header">
                        <div class="row">
                            <div class="col-lg-8">Nombre del cliente</div>
                            <div class="col-lg-4 d-lg-flex justify-content-end">Fecha</div>
                        </div>
                    </div>
                    <div class="card-body text-black tarjeta-color-body">
                        <p class="card-text">Sabor</p>
                        <p class="card-text">Relleno</p>
                        <p class="card-text">Anticipo</p>
                        <div class="row ">
                            <div class="col-8">
                                <p class="card-text">Restan</p>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <button type="button" class="btn-blue-boton btn-color-azul-b" data-bs-toggle="modal" data-bs-target="#vermas">
                                    Ver más
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 mt-4">
                <div class="card text-white" style="max-width: 30rem;">
                    <div class="card-header tarjeta-color-header">
                        <div class="row">
                            <div class="col-lg-8">Nombre del cliente</div>
                            <div class="col-lg-4 d-lg-flex justify-content-end">Fecha</div>
                        </div>
                    </div>
                    <div class="card-body text-black tarjeta-color-body">
                        <p class="card-text">Sabor</p>
                        <p class="card-text">Relleno</p>
                        <p class="card-text">Anticipo</p>
                        <div class="row ">
                            <div class="col-8">
                                <p class="card-text">Restan</p>
                            </div>
                            <div class="col-4 d-flex justify-content-end">
                                <button type="button" class="btn-blue-boton btn-color-azul-b" data-bs-toggle="modal" data-bs-target="#vermas">
                                    Ver más
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>


    </div>

    <!-- Modal Ver más -->
    <div class="modal fade" id="vermas" tabindex="-1" aria-labelledby="vermasLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content " style="background: transparent;border: none;">

                <div class="modal-header color-navbar br-modal-top">
                    <h5 class="modal-title" id="vermasLabel">Más detalles</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body color-modal br-modal-bot">

                    <div class="row mb-3">
                        <div class="col-9">Nombre del cliente</div>
                        <div class="col-3 d-lg-flex justify-content-end">Precio</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-9">Número de teléfono</div>
                        <div class="col-3 d-lg-flex justify-content-end">Anticipo</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-9">Sabor</div>
                        <div class="col-3 d-lg-flex justify-content-end">Restan</div>
                    </div>

                    <p>Dirección</p>
                    <p>Relleno</p>
                    <p>Rebanadas</p>
                    <p>Decoración</p>
                    <p>Fecha de entrega:</p>
                    <p>Hora de entrega:</p>

                    <div class="row mt-5 mb-2">

                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>

                            <div class="d-flex justify-content-end">
                                <a href="registrarP.php" class="btn-blue-boton btn-color-azul me-3 px-3">Editar</a>
                                <button type="button" class="btn-blue-boton btn-color-verde px-3" data-bs-dismiss="modal">Pagar</button>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection