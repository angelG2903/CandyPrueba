@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <div class="row d-flex justify-content-center mt-4 ">
        <div class="col-10">
            <form action="{{route('Order')}}" method="get">
                <div class="row">
                    <div class="col-sm-12 col-lg-auto">
                        <label for="opciones" class="form-label">Opciones</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-5">
                        <select class="form-select borde" aria-label="Default select example" id="opciones" name="buscar">
                            <option value="">Selecciona una opcion</option>
                            <option value="disponible" {{ old('buscar') == 'disponible' ? 'selected' :old('buscar') }}>Pedidos pendientes</option>
                            <option value="realizado" {{ old('buscar') == 'realizado' ? 'selected' :old('buscar') }}>Pedidos realizados</option>
                            <option value="cancelado" {{ old('buscar') == 'cancelado' ? 'selected' :old('buscar') }}>Pedidos cancelados</option>
                        </select>
                    </div>

                    <div class="d-none d-md-block col-md-auto col-lg-auto">
                        <button type="submit" class="btn-blue-boton btn-color-azul">Buscar</button>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-12 d-md-none d-flex justify-content-center">
                        <button type="submit" class="btn-blue-boton btn-color-azul">Buscar</button>
                    </div>
                </div>


            </form>
        </div>


    </div>
    
    

    @if(!empty($orders))
        <div class="row mt-3">
            <div class="col-12 text-center">

                @if($buscar == 'disponible')
                <h3>Pedidos pendientes</h3">
                @endif
                @if($buscar == 'realizado')
                <h3>Pedidos realizados</h3>
                @endif
                @if($buscar == 'cancelado')
                <h3>Pedidos cancelados</h3>
                @endif
            </div>
        </div>
        <!-- pedidos -->
        @foreach($orders as $order)
            <div class="row mt-5 d-flex justify-content-center">

                <div class="col-sm-12 col-lg-6">
                    <div class="card text-white card-sombra" style="max-width: 40rem;">
                        <div class="card-header tarjeta-color-header">
                            <div class="row">
                                <div class="col-lg-8">Nombre del cliente: {{ $order->nombre }}</div>
                                <div class="col-lg-4 d-lg-flex justify-content-end">Precio: {{ $order->precio }}</div>
                            </div>
                        </div>
                        <div class="card-body text-black tarjeta-color-body">
                            <div class="row mb-3">
                                <div class="col-8">
                                    @foreach($users as $use)
                                        @if($order->id_sale == $use->id)
                                            <p class="card-text">Responsable: {{ $use->name }}</p>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    @if($buscar == 'disponible')
                                        <span class="badge rounded-pill btn-color-azul">Pendiente</span>
                                    @endif
                                    @if($buscar == 'realizado')
                                        <span class="badge rounded-pill btn-color-verde">Finalizado</span>
                                    @endif
                                    @if($buscar == 'cancelado')
                                        <span class="badge rounded-pill btn-color-rojo">Cancelado</span>
                                    @endif
                                    
                                </div>
                            </div>
                            <p class="card-text">Número de teléfono: {{ $order->telefono }}</p>
                            <p class="card-text">Sabor: {{ $order->sabor }}</p>
                            <p class="card-text">Relleno: {{ $order->relleno }}</p>
                            <p class="card-text">Rebanadas: {{ $order->rebanadas }}</p>
                            <p class="card-text">Decoración: {{ $order->decoracion }}</p>
                            <p class="card-text">Dirección: {{ $order->direccion }}</p>
                            <div class="row mb-3">
                                <div class="col-8">
                                    <p class="card-text">Fecha de entrega: {{ Carbon\Carbon::parse($order-> fechaEntrega)->format('d-m-Y') }}</p>
                                </div>
                                <div class="col-3 ">
                                    <p class="card-text">Anticipo: {{ $order->anticipo }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-8">
                                    <p class="card-text">Hora de entrega: {{ Carbon\Carbon::parse($order-> horaEntrega)->isoFormat('h:m A') }}</p>
                                </div>
                                <div class="col-3">
                                    <p class="card-text">Restan: {{ ($order->precio) - ($order->anticipo)  }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h3>No hay pedidos</h3>
            </div>
        </div>

    @endif

</div>


@endsection