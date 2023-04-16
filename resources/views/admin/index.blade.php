@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container mb-5">

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
                <div class="col-sm-12 col-lg-7 table-responsive-sm">
                    <h5>Pasteles vendidos</h5>
                    <table class="table table-borderless">
                        <thead class="color-thead-good">
                            <tr class="vertical-align-middle">
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
                                <td><div class="ancho-columna-fecha">{{ Carbon\Carbon::parse($cake-> updated_at)->format('d-m-Y') }}</div></td>
                                <td><div class="etiqueta-tabla">{{ $cake -> etiqueta }}</div></td>
                                <td><div class="precio-tabla">{{ $cake -> precio }}</div></td>

                            </tr>
                            @php
                                $cont++;
                                $total+= ($cake -> precio);
                            @endphp
                            @endforeach
                            <tr class="color-footer-b">
                                <th scope="row" colspan="5" class="bordes-b-r">Total</th>
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

                    <h5>Velas vendidas</h5>
                    <table class="table table-borderless">
                        <thead class="color-thead-good">
                            <tr class="align-middle">
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
                            <tr class="color-border-b align-middle">
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
                                <th scope="row" colspan="2" class="bordes-b-r">Total</th>
                                <td class="fw-bold bordes-b-l"><div class="precio-tabla">{{ $totalC }}</div></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        @endif

        @if(!empty($orders))
            <!-- Tabla pedidos -->
            <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
                <div class="col-sm-12 col-lg-6">

                    <h5>Anticipo de pedidos</h5>
                    <table class="table table-borderless">
                        <thead class="color-thead-good">
                            <tr class="align-middle">
                                <th scope="col" class="bordes-t-l">#</th>
                                <th scope="col">Nombre del cliente</th>
                                <th scope="col"><div class="ancho-columna-fecha">Fecha</div></th>
                                <th scope="col" class="bordes-t-r"><div class="precio-tabla">Anticipo</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contO = 1;
                                $totalO = 0;
                            @endphp
                            @foreach($orders as $order)
                            <tr class="color-border-b align-middle">
                                <th scope="row">{{ $contO }}</th>
                                <td>{{ $order -> nombre }}</td>
                                <td><div class="ancho-columna-fecha">{{ Carbon\Carbon::parse($order-> updated_at)->format('d-m-Y') }}</div></td>
                                <td><div class="precio-tabla">{{ $order -> anticipo }}</div></td>

                            </tr>
                            @php
                                $contO++;
                                $totalO+= ($order -> anticipo);
                            @endphp
                            @endforeach
                            <tr class="color-footer-b">
                                <th scope="row" colspan="3" class="bordes-b-r">Total</th>
                                <td class="fw-bold bordes-b-l"><div class="precio-tabla">{{ $totalO }}</div></td>
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(Session('mensaje') == 'actualizado')
<script>
    Swal.fire(
        'Perfil actualizado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'nada')
<script>
    Swal.fire(
        'No hubo ningun cambio en su perfil',
        '',
        'success'
    )
</script>
@endif





@endsection