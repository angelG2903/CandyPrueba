@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container mb-5">


@if(!empty($cakes)||!empty($candles))

    @if(!empty($cakes))
        <!-- Tabla de los pasteles -->
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
                            <th scope="col" class="bordes-t-r"><div class="precio-tabla">Precio</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $cont = 1;
                            $total = 0;
                        @endphp

                        @foreach($cakes as $cake)
                        <tr class="color-border-b align-middle">
                            <th scope="row"><div class="number-tabla">{{ $cont }}</div></th>
                            <td><div class="sabor-tabla">{{ $cake -> sabor }}</div></td>
                            <td><div class="tamano-tabla">{{ $cake -> tamanio }}</div></td>
                            <td><div class="ancho-columna-fecha">{{ Carbon\Carbon::parse($cake-> created_at)->format('d-m-Y') }}</div></td>
                            <td><div class="etiqueta-tabla">{{ $cake -> etiqueta }}</div></td>
                            <td><div class="precio-tabla">{{ $cake -> precio }}</div></td>

                        </tr>
                        @php
                            $cont++;
                            $total+= ($cake -> precio);
                        @endphp
                        
                        @endforeach
                        <tr class="color-footer-b">
                            <th scope="row" class="bordes-b-r"><div class="number-tabla">{{ $cont - 1 }}</div></th>
                            <td colspan="4">Total</td>
                            <td class="fw-bold bordes-b-l"><div class="precio-tabla">{{ $total }}</div></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    @endif

    @if(!empty($candles))
        <!-- Tabla velitas -->
        <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
            <div class="col-sm-12 col-lg-5">

                <h5>Velas en stock</h5>
                <table class="table table-borderless">
                    <thead class="color-thead-good">
                        <tr>
                            <th scope="col" class="bordes-t-l"><div class="number-tabla">#</div></th>
                            <th scope="col"><div class="sabor-tabla">Nombre</div></th>
                            <th scope="col" class="bordes-t-r"><div class="precio-tabla">Precio</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php    
                            $contC = 1;
                            $totalC = 0;
                        @endphp

                        @foreach($candles as $candle)
                        <tr class="color-border-b">
                            <th scope="row"><div class="number-tabla">{{ $contC }}</div></th>
                            <td><div class="sabor-tabla">{{ $candle -> nombre }}</div></td>
                            <td><div class="precio-tabla">{{ $candle -> precio }}</div></td>

                        </tr>

                        @php
                            $contC++;
                            $totalC+= ($candle -> precio);
                        @endphp
                        
                        @endforeach

                        <tr class="color-footer-b">
                            <th scope="row" class="bordes-b-r"><div class="number-tabla">{{ $contC - 1 }}</div></th>
                            <td><div class="sabor-tabla">Total</div></td>
                            <td class="fw-bold bordes-b-l"><div class="precio-tabla">{{ $totalC }}</div></td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    @endif

    <!-- Tabla de los pasteles rezagados -->
    <!-- <div class="row mt-4 mb-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Pasteles rezagados</h5>
            <table class="table table-borderless">
                <thead class="color-thead-p">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sabor</th>
                        <th scope="col">Tamaño</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Etiqueta</th>
                        <th scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-border-b">
                        <th scope="row">1</th>
                        <td>3 Leches</td>
                        <td>Grande</td>
                        <td>05/02/2023</td>
                        <td>Lunes</td>
                        <td>320</td>

                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Chocolate</td>
                        <td>Mediano</td>
                        <td>05/02/2023</td>
                        <td>Martes</td>
                        <td>300</td>


                    </tr>
                    <tr class="color-footer-b">
                        <th scope="row" colspan="5">Total</th>
                        <td class="fw-bold">620</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div> -->

@else
    <h3>No hay producto en stock</h3>
@endif

</div>







@endsection