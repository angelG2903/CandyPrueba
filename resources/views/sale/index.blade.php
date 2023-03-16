@extends('layouts.appRegister')

@section('content')

<!-- @if(Session::has('mensaje'))
<div class="alert alert-success d-flex justify-content-between align-items-center mx-2" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif -->


<!-- Contenido de la pagina -->
<div class="container">

@if(!empty($cakes)||!empty($candles))

        @if(!empty($cakes))
            <!-- Tabla de los pasteles d-flex justify-content-center-->
            <div class="row mt-4 d-flex justify-content-center">
                <div class="col-sm-12 col-lg-10 table-responsive-sm">
                    <h5>Pasteles vendidos</h5>
                    <table class="table table-borderless">
                        <thead class="color-thead-good">
                            <tr>
                                <th scope="col" class="bordes-t-l">#</th>
                                <th scope="col">Sabor</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Etiqueta</th>
                                <th scope="col">Precio</th>
                                <th scope="col" class="bordes-t-r"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                            $cont = 1;
                            $total = 0;

                            @endphp
                            @foreach( $cakes as $cake )
                            <tr class="color-border-b">
                                <th scope="row">{{$cont}}</th>
                                <td>{{ $cake ->sabor }}</td>
                                <td>{{ $cake -> tamanio }}</td>
                                <td>{{ Carbon\Carbon::parse($cake-> created_at)->format('d-m-Y') }}</td>
                                <td>{{ $cake -> etiqueta }}</td>
                                <td>{{ $cake -> precio }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-toggle="modal" data-bs-target="#borrar-{{$cake ->id}}">Cancelar</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- borrar venta -->
                            <div class="modal fade" id="borrar-{{$cake ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background: transparent;border: none;">
                                        <div class="modal-header color-pregun br-modal-top">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estás seguro de cancelar el pastel?</h1>
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
                                                <form method="POST" action="{{ route('Sale.updateQ', $cake->id) }}" role="form" enctype="multipart/form-data" class="d-none needs-validation">
                                                    @csrf
                                                    {{ method_field('PATCH') }}

                                                    <input class="d-none" type="number" name="id_sale" value="0">
                                                    <input class="d-none" type="text" name="status" value="disponible">
                                                    <button type="submit" class="btn-blue-boton btn-color-verde">Aceptar</button>
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
                                <td colspan="2" class="fw-bold bordes-b-l">{{$total}}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        @endif

        @if(!empty($candles))
            <!-- Tabla velitas -->
            <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
                <div class="col-sm-12 col-md-7 col-lg-5">

                    <h5>Velitas vendidas</h5>
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
                                        <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-toggle="modal" data-bs-target="#borrarV-{{$candle ->id}}">Cancelar</button>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="borrarV-{{$candle ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background: transparent;border: none;">
                                        <div class="modal-header color-pregun br-modal-top">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estás seguro de cancelar la velita?</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body color-modal br-modal-bot">
                                            <div class="row mb-3">
                                                <div class="col-8">Nombre: {{$candle -> nombre}}</div>
                                                <div class="col-4 d-lg-flex justify-content-end">Precio: {{$candle -> precio}}</div>
                                            </div>

                                            <div class="d-flex justify-content-between mt-4 mb-2">

                                                <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                                                <form method="POST" action="{{ route('Sale.updateCQ', $candle->id) }}" role="form" enctype="multipart/form-data" class="d-none needs-validation">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                            
                                                    <input class="d-none" type="number" name="id_sale" value="0">
                                                    <input class="d-none" type="text" name="status" value="disponible">
                                                    <button type="submit" class="btn-blue-boton btn-color-verde">Aceptar</button>

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
        @endif
        
        <div class="row d-flex justify-content-center mt-5 mb-5 mx-2">

            <div class="col-sm-12 col-lg-6 total-venta d-flex justify-content-between py-1">
                @if(!empty($candles) && !empty($cakes))
                    <h4 class="mb-0 ps-2">Total: {{$total + $totalC}}</h4>
                @endif
                @if(!empty($candles) && empty($cakes))
                    <h4 class="mb-0 ps-2">Total: {{$totalC}}</h4>
                @endif
                @if(!empty($cakes) && empty($candles))
                    <h4 class="mb-0 ps-2">Total: {{$total}}</h4>
                @endif
                <h4 class="mb-0 pe-2">{{ $date->format('d-m-Y') }}</h4>
            </div>

        </div>
        
    @else
        <h3>No hay producto vendido</h3>
    @endif

</div>


@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Mensajes de pasteles -->

@if(Session('mensaje') == 'Pastel agregado a la venta con éxito')
<script>
    Swal.fire(
        'Pastel agregado a la venta con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Pastel eliminado de la venta con éxito')
<script>
    Swal.fire(
        'Pastel eliminado de la venta con éxito',
        '',
        'success'
    )
</script>
@endif

<!-- Mensajes de velitas -->
@if(Session('mensaje') == 'Velita agregada a la venta con éxito')
<script>
    Swal.fire(
        'Velita agregada a la venta con éxito',
        '',
        'success'
    )
</script>
@endif


@if(Session('mensaje') == 'Velita eliminada de la venta con éxito')
<script>
    Swal.fire(
        'Velita eliminada de la venta con éxito',
        '',
        'success'
    )
</script>
@endif


@endsection