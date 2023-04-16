@extends('layouts.appRegister')

@section('content')

<!-- @if(Session::has('mensaje'))
<div class="alert alert-success d-flex justify-content-between align-items-center mx-2" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif -->

<div class="container">

@if(!empty($cakes)||!empty($candles))

    @if(!empty($cakes))
        <!-- Tabla de los pasteles d-flex justify-content-center-->
        <div class="row mt-4 d-flex justify-content-center">
            <div class="col-sm-12 col-lg-8 table-responsive-sm">
                <h5>Pasteles registrados</h5>
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
                                    <a href="{{ route('Product.edit',$cake->id) }}" class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>

                                    <button type="button" class="f-icon-delete" data-bs-toggle="modal" data-bs-target="#borrar-{{$cake ->id}}" style="border: 0;"><i class="bi bi-trash"></i></button>

                                </div>
                            </td>
                        </tr>
                        <!-- Borrar -->
                        <div class="modal fade" id="borrar-{{$cake ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="background: transparent;border: none;">
                                    <div class="modal-header color-pregun br-modal-top">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estás seguro de eliminar este pastel?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body color-modal br-modal-bot">
                                        <div class="row mb-3">
                                            <div class="col-8">Sabor: {{ $cake ->sabor }}</div>
                                            <div class="col-4 d-lg-flex justify-content-end">Precio: {{ $cake -> precio }}</div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-8">Fecha: {{ Carbon\Carbon::parse($cake-> created_at)->format('d-m-Y') }}</div>
                                            <div class="col-4 d-lg-flex justify-content-end">Tamaño: {{ $cake -> tamanio }}</div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4 mb-2">
                                            <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('Product.destroy',$cake ->id)}}" class="d-none" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn-blue-boton btn-color-verde" style="border: 0;">Aceptar</button>
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
    @endif

    @if(!empty($candles))
        <!-- Tabla velitas -->
        <div class="row  mt-4 mb-5 d-flex justify-content-center table-responsive-sm">
            <div class="col-sm-12 col-lg-5">

                <h5>Velitas registradas</h5>
                <table class="table table-borderless">
                    <thead class="color-thead-good">
                        <tr>
                            <th scope="col" class="bordes-t-l"><div class="number-tabla">#</div></th>
                            <th scope="col"><div class="sabor-tabla">Nombre</div></th>
                            <th scope="col"><div class="precio-tabla">Precio</div></th>
                            <th scope="col" class="bordes-t-r"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php

                        $contC = 1;
                        $totalC = 0;

                        @endphp
                        @foreach( $candles as $candle )
                        <tr class="color-border-b align-middle">
                            <th scope="row"><div class="number-tabla">{{ $contC }}</div></th>
                            <td><div class="sabor-tabla">{{ $candle -> nombre }}</div></td>
                            <td><div class="precio-tabla">{{ $candle -> precio }}</div></td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('Product.editC',$candle->id) }}" class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>

                                    <button type="button" class="f-icon-delete" data-bs-toggle="modal" data-bs-target="#borrarV-{{$candle ->id}}" style="border: 0;"><i class="bi bi-trash"></i></button>
                                
                                </div>
                            </td>
                        </tr>

                        <!-- Borrar -->
                        <div class="modal fade" id="borrarV-{{$candle ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="background: transparent;border: none;">
                                    <div class="modal-header color-pregun br-modal-top">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estás seguro de eliminar esta velita?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body color-modal br-modal-bot">
                                        <div class="row mb-4">
                                            <div class="col-8">Nombre: {{ $candle -> nombre }}</div>
                                            <div class="col-4 d-lg-flex justify-content-end">Precio: {{ $candle -> precio }} </div>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4 mb-2">
                                            <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                                            <form action="{{ route('Product.destroyC',$candle ->id)}}" class="d-none" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn-blue-boton btn-color-verde" style="border: 0;">Aceptar</button>
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
                            <td colspan="2" class="fw-bold bordes-b-l"><div class="precio-tabla">{{ $totalC }}</div></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    @endif
@else
    <h3>No hay producto registrado</h3>
@endif


</div>

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Mensajes de pasteles -->

@if(Session('mensaje') == 'Pastel registrado con éxito')
<script>
    Swal.fire(
        'Pastel registrado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Pastel eliminado con éxito')
<script>
    Swal.fire(
        'Pastel eliminado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Pastel editado con éxito')
<script>
    Swal.fire(
        'Pastel editado con éxito',
        '',
        'success'
    )
</script>
@endif

<!-- Mensajes de velitas -->

@if(Session('mensaje') == 'Velita registrada con éxito')
<script>
    Swal.fire(
        'Velita registrada con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Velita editada con éxito')
<script>
    Swal.fire(
        'Velita editada con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Velita eliminada')
<script>
    Swal.fire(
        'Velita eliminada',
        '',
        'success'
    )
</script>
@endif




@endsection