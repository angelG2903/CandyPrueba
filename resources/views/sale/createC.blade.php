@extends('layouts.appRegister')

@section('content')


<div class="container">


    @if(!empty($candles))
    <!-- Tabla velitas -->
    <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
        <div class="col-sm-12 col-md-7 col-lg-5">

            <h5>Velitas en stock</h5>
            <table class="table table-borderless">
                <thead class="color-thead-good">
                    <tr>
                        <th scope="col" class="bordes-t-l">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col" class="bordes-t-r"></th>
                    </tr>
                </thead>
                <tbody>
                    @php

                    $contC = 1;
                    $totalC = 0;

                    @endphp
                    @foreach( $candles as $candle )
                    <tr class="color-border-b">
                        <th scope="row">{{$contC}}</th>
                        <td>{{ $candle -> nombre }}</td>
                        <td>{{ $candle -> precio }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn-blue-boton btn-color-azul-b px-3 me-1" data-bs-toggle="modal" data-bs-target="#borrar-{{$candle ->id}}">Agregar</button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="borrar-{{$candle ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="background: transparent;border: none;">
                                <div class="modal-header color-pregun br-modal-top">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estas seguro de agregar la velita?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body color-modal br-modal-bot">
                                    <div class="row mb-3">
                                        <div class="col-8">Nombre: {{$candle -> nombre}}</div>
                                        <div class="col-4 d-lg-flex justify-content-end">Precio: {{$candle -> precio}}</div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4 mb-2">

                                        <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST" action="{{ route('Sale.updateC', $candle->id) }}" role="form" enctype="multipart/form-data" class="d-none needs-validation">
                                            @csrf
                                            {{ method_field('PATCH') }}
                                            <input class="d-none" type="number" name="id_sale" value="{{$user}}">
                                            <input class="d-none" type="text" name="status" value="vendido">
                                            <button type="submit" class="btn-blue-boton btn-color-verde px-3 me-1">Aceptar</button>

                                        </form>
                                        
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    @php
                    $contC++;
                    $totalC+= ($candle -> precio);
                    @endphp
                    @endforeach
                    <tr class="color-footer-b">
                        <th scope="row" colspan="2" class="bordes-b-r">Total</th>
                        <td colspan="2" class="fw-bold bordes-b-l">{{$totalC}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    @else
    <h3>No hay velitas en stock</h3>
    @endif

</div>


@endsection