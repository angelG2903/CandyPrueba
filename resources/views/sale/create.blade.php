@extends('layouts.appRegister')

@section('content')

<!-- Contenido de la pagina -->
<div class="container mb-5">


    @if(!empty($cakes))
    <!-- Tabla de los pasteles d-flex justify-content-center-->
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-7 table-responsive-sm">
            <h5>Pasteles en stock</h5>
            <table class="table table-borderless">
                <thead class="color-thead-good">
                    <tr class="align-middle">
                        <th scope="col" class="bordes-t-l"><div class="number-tabla">#</div></th>
                        <th scope="col"><div class="sabor-tabla">Sabor</div></th>
                        <th scope="col"><div class="tamano-tabla">Tamaño</div></th>
                        <th scope="col"><div class="ancho-columna-fecha">Fecha</div></th>
                        <th scope="col"><div class="etiqueta-tabla">Etiqueta</div></th>
                        <th scope="col"><div class="precio-tabla">Precio</div></th>
                        <th scope="col" class="bordes-t-r"></th>
                    </tr>
                </thead>
                <tbody>
                    @php

                    $cont = 1;
                    $total = 0;

                    @endphp
                    @foreach( $cakes as $cake )
                    <tr class="color-border-b align-middle">
                        <th scope="row"><div class="number-tabla">{{ $cont }}</div></th>
                        <td><div class="sabor-tabla">{{ $cake -> sabor }}</div></td>
                        <td><div class="tamano-tabla">{{ $cake -> tamanio }}</div></td>
                        <td><div class="ancho-columna-fecha">{{ Carbon\Carbon::parse($cake-> created_at)->format('d-m-Y') }}</div></td>
                        <td><div class="etiqueta-tabla">{{ $cake -> etiqueta }}</div></td>
                        <td><div class="precio-tabla">{{ $cake -> precio }}</div></td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn-blue-boton btn-color-azul-b px-3 me-1" data-bs-toggle="modal" data-bs-target="#borrar-{{$cake ->id}}">Agregar</button>
                            </div>
                        </td>
                    </tr>

                    <div class="modal fade" id="borrar-{{$cake ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="background: transparent;border: none;">
                                <div class="modal-header color-pregun br-modal-top">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estas seguro de agregar el pastel?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body color-modal br-modal-bot">
                                    <div class="row mb-3">
                                        <div class="col-8">Sabor: {{$cake -> sabor}}</div>
                                        <div class="col-4 d-lg-flex justify-content-end">Precio: {{$cake -> precio}}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">Tamaño: {{$cake -> tamanio}}</div>
                                        <div class="col-4 d-lg-flex justify-content-end">Etiqueta: {{$cake -> etiqueta}}</div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-4 mb-2">

                                        <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                                        <form method="POST" action="{{ route('Sale.update', $cake->id) }}" role="form" enctype="multipart/form-data" class="d-none needs-validation">
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
                    $cont++;
                    $total+= ($cake -> precio);
                    @endphp
                    @endforeach
                    <tr class="color-footer-b">
                        <th scope="row" colspan="5" class="bordes-b-r">Total</th>
                        <td colspan="2" class="fw-bold bordes-b-l"><div class="precio-tabla">{{$total}}</div></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    @else
    <h3>No hay pasteles en stock </h3>
    @endif

</div>


@endsection