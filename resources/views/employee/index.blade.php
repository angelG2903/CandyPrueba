@extends('layouts.appEm')

@section('content')
<div class="container-fluid">

    <div class="row mt-5 ">
        <!-- Logo -->
        <div class="col-md-12 col-lg-7">
            <img src="../resources/img/Candy.png" alt="" class="img-fluid">
        </div>

        <!-- Botones -->
        <div class="col-md-12 col-lg-4 mt-5">
            <div class="col-sm-12 d-flex justify-content-center">
                <a href="{{ route('employee.RegisterProduct') }}" class="botonNew">Registrar producto</a>
            </div>
            <div class="col-sm-12 d-flex justify-content-center">
                <a href="{{ route('employee.RecordSale') }}" class="botonNew">Registrar venta</a>

            </div>

            <div class="col-sm-12 d-flex justify-content-center">

                <a href="{{ route('employee.RegisterOrder') }}" class="botonNew">Registar pedido</a>
            </div>

            <div class="col-sm-12 d-flex justify-content-center">
                <a href="{{ route('employee.showOrder') }}" class="botonNew">Consulta de pedidos</a>
            </div>
            
        </div>
    </div>
    
</div>


<!-- Notificacion-->
<div class="modal fade " id="noti" tabindex="-1" aria-labelledby="velasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content " style="background: transparent;border: none;">
            <div class="modal-header color-navbar br-modal-top">
                <h5 class="modal-title" id="velasLabel">Notificación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body color-modal br-modal-bot">


                <div class="row mb-2 d-flex justify-content-center">

                    <div class="col-10">
                        <h4>Pasteles rezagados</h4>
                    </div>

                    <div class="col-10 mt-1">
                        <div class="card" style="max-width: 40rem;">
                            <div class="card-header text-white tarjeta-color-header">
                                <div class="row">
                                    <div class="col-8">3 leches</div>
                                    <div class="col-4 d-flex justify-content-end">Grande</div>
                                </div>
                            </div>
                            <div class="card-body text-black tarjeta-color-body">

                                <div class="row">
                                    <div class="col-8">
                                        <p class="card-text">Entró: Lunes</p>
                                    </div>
                                    <div class="col-4 d-flex justify-content-end">
                                        <p class="card-text">05/02/2023</p>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="card-text">Precio</p>
                                    </div>
                                </div>
                                

                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center pt-4">
                    <button type="button" class="btn-blue-boton btn-color-azul" data-bs-dismiss="modal">Aceptar</button>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection