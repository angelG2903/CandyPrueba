@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <div class="row d-flex justify-content-center mt-4">
        <div class="col-10">
            <form action="{{route('Dashboard')}}" method="get">
                <div class="row">
                    <div class="col-sm-12 col-lg-auto">
                        <label for="fecha" class="form-label">Introduzca la fecha para ver el corte</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <input type="date" name="buscar" class="form-control" value="{{ $buscar }}" id="fecha">
                    </div>

                    <!-- <div class="col-sm-12 col-md-6 col-lg-4">
                        <input type="text" name="buscar" class="form-control" value="{{ $buscar }}" id="fecha">
                    </div> -->

                    <div class="d-none d-md-block col-md-auto col-lg-auto">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-12 d-md-none d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>


            </form>
        </div>


    </div>

    @if(!empty($cakes)||!empty($candles)||!empty($orders))

        @if(!empty($cakes))
            <!-- Tabla de los pasteles-->
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
                                <th scope="col" class="bordes-t-r">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $cont = 1;
                                $total = 0;
                            @endphp
                            @foreach($cakes as $cake)
                            <tr class="color-border-b">
                                <th scope="row">{{ $cont }}</th>
                                <td>{{ $cake -> sabor }}</td>
                                <td>{{ $cake -> tamanio }}</td>
                                <td>{{ Carbon\Carbon::parse($cake-> updated_at)->format('d-m-Y') }}</td>
                                <td>{{ $cake -> etiqueta }}</td>
                                <td>{{ $cake -> precio }}</td>

                            </tr>
                            @php
                                $cont++;
                                $total+= ($cake -> precio);
                            @endphp
                            @endforeach
                            <tr class="color-footer-b">
                                <th scope="row" colspan="5" class="bordes-b-r">Total</th>
                                <td class="fw-bold bordes-b-l">{{ $total }}</td>
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

                    <h5>Velas vendidas</h5>
                    <table class="table table-borderless">
                        <thead class="color-thead-good">
                            <tr>
                                <th scope="col" class="bordes-t-l">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" class="bordes-t-r">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contC = 1;
                                $totalC = 0;
                            @endphp
                            @foreach($candles as $candle)
                            <tr class="color-border-b">
                                <th scope="row">{{ $contC }}</th>
                                <td>{{ $candle -> nombre }}</td>
                                <td>{{ $candle -> precio }}</td>

                            </tr>
                            @php
                                $contC++;
                                $totalC+= ($candle -> precio);
                            @endphp
                            @endforeach
                            <tr class="color-footer-b">
                                <th scope="row" colspan="2" class="bordes-b-r">Total</th>
                                <td class="fw-bold bordes-b-l">{{ $totalC }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        @endif

        @if(!empty($orders))
            <!-- Tabla pedidos -->
            <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
                <div class="col-sm-12 col-md-7 col-lg-6">

                    <h5>Anticipo de pedidos</h5>
                    <table class="table table-borderless">
                        <thead class="color-thead-good">
                            <tr>
                                <th scope="col" class="bordes-t-l">#</th>
                                <th scope="col">Nombre del cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col" class="bordes-t-r">Anticipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contO = 1;
                                $totalO = 0;
                            @endphp
                            @foreach($orders as $order)
                            <tr class="color-border-b">
                                <th scope="row">{{ $contO }}</th>
                                <td>{{ $order -> nombre }}</td>
                                <td>{{ Carbon\Carbon::parse($order-> updated_at)->format('d-m-Y') }}</td>
                                <td>{{ $order -> anticipo }}</td>

                            </tr>
                            @php
                                $contO++;
                                $totalO+= ($order -> anticipo);
                            @endphp
                            @endforeach
                            <tr class="color-footer-b">
                                <th scope="row" colspan="3" class="bordes-b-r">Total</th>
                                <td class="fw-bold bordes-b-l">{{ $totalO }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        @endif

        <div class="row d-flex justify-content-center mt-4 mb-5 mx-2">
            <div class="col-sm-12 col-lg-6 total-venta d-flex justify-content-between py-1">

                @if(!empty($candles) && !empty($cakes) && !empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{$total + $totalC + $totalO}}</h4>
                @endif

                @if(!empty($candles) && !empty($cakes) && empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{ $total + $totalC }}</h4>
                @endif

                @if(!empty($candles) && empty($cakes) && !empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{ $totalC + $totalO }}</h4>
                @endif

                @if(empty($candles) && !empty($cakes) && !empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{$total + $totalO}}</h4>
                @endif

                @if(empty($candles) && empty($cakes) && !empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{$totalO}}</h4>
                @endif

                @if(!empty($candles) && empty($cakes) && empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{$totalC}}</h4>
                @endif

                @if(empty($candles) && !empty($cakes) && empty($orders))
                    <h4 class="mb-0 ps-2">Total: {{$total}}</h4>
                @endif
                <h4 class="mb-0 pe-2">{{ Carbon\Carbon::parse($buscar)->format('d-m-Y') }}</h4>

            </div>
        </div>
    @else
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h3>No hay producto vendido</h3>
            </div>
        </div>
        
    @endif

</div>



@endsection