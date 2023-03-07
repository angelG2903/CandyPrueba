@extends('layouts.appEm')

@section('content')
<div class="container">

@if(Session::has('mensaje'))
    <div class="alert alert-success" role="alert">
            {{ Session::get('mensaje') }}  
    </div>
@endif



    <div class="row mb-4 d-flex justify-content-start">

        @php

            $cont = 1;

        @endphp

        @foreach( $orders as $order )
        <div class="col-sm-12 col-lg-6 mt-4">
            <div class="card text-white" style="max-width: 30rem;">
                <div class="card-header tarjeta-color-header">
                    <div class="row">
                        <div class="col-lg-8">Cliente: {{ $order-> nombre }}</div>
                        <div class="col-lg-4 d-lg-flex justify-content-end">Fecha: {{ Carbon\Carbon::parse($order-> fechaEntrega)->format('d-m-Y') }}</div>
                    </div>
                </div>
                <div class="card-body text-black tarjeta-color-body">
                    <p class="card-text">Sabor: {{ $order-> sabor }}</p>
                    <p class="card-text">Relleno: {{ $order-> relleno }}</p>
                    <p class="card-text">Anticipo: {{ $order-> anticipo }}</p>
                    <div class="row ">
                        <div class="col-8">
                            <p class="card-text">Restan: {{ ($order->precio) - ($order->anticipo)  }}</p>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <button type="button" class="btn-blue-boton btn-color-azul-b" data-bs-toggle="modal" data-bs-target="#vermas-{{ $cont }}">
                                Ver más
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="vermas-{{$cont}}" tabindex="-1" aria-labelledby="vermasLabel" aria-hidden="true">

            <div class="modal-dialog">

                <div class="modal-content " style="background: transparent;border: none;">

                    <div class="modal-header color-navbar br-modal-top">
                        <h5 class="modal-title" id="vermasLabel">Más detalles</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body color-modal br-modal-bot">

                        <div class="row mb-3">
                            <div class="col-8">Cliente: {{ $order-> nombre }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">Precio: {{ $order-> precio }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">Teléfono: {{ $order-> telefono }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">Anticipo: {{ $order-> anticipo }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-8">Sabor: {{ $order-> sabor }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">Restan: {{ ($order->precio) - ($order->anticipo)  }}</div>
                        </div>

                        <p>Dirección: {{ $order-> direccion }}</p>
                        <p>Relleno: {{ $order-> relleno }}</p>
                        <p>Rebanadas: {{ $order-> rebanadas }}</p>
                        <p>Decoración: {{ $order-> decoracion }}</p>
                        <p>Fecha de entrega: {{ Carbon\Carbon::parse($order-> fechaEntrega)->format('d-m-Y') }}</p>
                        <p>Hora de entrega: {{  Carbon\Carbon::parse($order-> horaEntrega)->isoFormat('h:m A') }}</p>

                        <div class="row mt-5 mb-2">

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('Order.edit',$order->id) }}" class="btn-blue-boton btn-color-azul me-3 px-3">Editar</a>
                                    <button type="button" class="btn-blue-boton btn-color-verde px-3" data-bs-dismiss="modal">Pagar</button>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>

        @php
            $cont++;
        @endphp

        @endforeach

    </div>


</div>

<!-- Modal Ver más -->

@endsection