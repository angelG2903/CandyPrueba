@extends('layouts.appEm')

@section('content')
<div class="container">

    <!-- @if(Session::has('mensaje'))
    <div class="alert alert-success d-flex justify-content-between align-items-center" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif -->


@if(!empty($orders))
    <div id="formulario" class="row mb-4 d-flex justify-content-start">
        <h3>Pedidos pendientes</h3>


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
                    <div class="row">
                        <div class="col-8">
                            <p class="card-text">Sabor: {{ $order-> sabor }}</p>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <span class="badge rounded-pill btn-color-azul">Pendiente</span>
                        </div>
                    </div>
                    <p class="card-text">Relleno: {{ $order-> relleno }}</p>
                    <p class="card-text">Anticipo: {{ $order-> anticipo }}</p>
                    <div class="row ">
                        <div class="col-8">
                            <p class="card-text">Restan: {{ ($order->precio) - ($order->anticipo)  }}</p>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <button type="button" class="btn-blue-boton btn-color-azul-b" data-bs-toggle="modal" data-bs-target="#vermas-{{ $order ->id }}">
                                Ver más
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="vermas-{{$order ->id}}" tabindex="-1" aria-labelledby="vermasLabel" aria-hidden="true">

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
                        <div class="row mb-3">
                            <div class="col-8">Hora de entrega: {{ Carbon\Carbon::parse($order-> horaEntrega)->isoFormat('h:m A') }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">
                                <span class="badge rounded-pill btn-color-azul fs-5">Pendiente</span>
                            </div>
                        </div>
                        
                        <div class="row mt-5 mb-2">

                            <div class="d-flex justify-content-between">

                                <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-toggle="modal" data-bs-target="#borrar-{{$order ->id}}">
                                    Cancelar pedido
                                </button>


                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('Order.edit',$order->id) }}" class="btn-blue-boton btn-color-azul me-3 px-3">Editar</a>
                                    <button type="button" class="btn-blue-boton btn-color-verde px-3" data-bs-toggle="modal" data-bs-target="#pagar-{{$order ->id}}">Pagar</button>
                                </div>
                            </div>

                        </div>
                        


                    </div>

                </div>
            </div>
        </div>

        <!-- pagar -->
        <div class="modal fade" id="pagar-{{$order ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: transparent;border: none;">
                    <div class="modal-header color-thead-good br-modal-top">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Verificar los siguientes datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body color-modal br-modal-bot">
                        <div class="row mb-3">
                            <div class="col-8">Cliente: {{ $order-> nombre }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">Precio: {{ $order-> precio }}</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-8">Sabor: {{ $order-> sabor }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">Anticipo: {{ $order-> anticipo }}</div>
                        </div>
                        <p>Fecha de entrega: {{ Carbon\Carbon::parse($order-> fechaEntrega)->format('d-m-Y') }}</p>
                        <p>Hora de entrega: {{ Carbon\Carbon::parse($order-> horaEntrega)->isoFormat('h:m A') }}</p>
                        <p>El cliente debe pagar: {{ ($order->precio) - ($order->anticipo)  }}</p>
                        <div class="d-flex justify-content-between mt-4 mb-2">

                            <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                            
                            <form method="post" action="{{ route('Order.payOrder', $order->id) }}" role="form" enctype="multipart/form-data" class="needs-validation">
                                @csrf
                                {{ method_field('PATCH') }}
                        
                                <input class="d-none" type="number" name="id_sale" value="{{$user}}">
                                <input class="d-none" type="text" name="status" value="realizado">
                                <button type="submit" class="btn-blue-boton btn-color-verde">Aceptar</button>

                            </form>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- Borrar -->
        <div class="modal fade" id="borrar-{{$order ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="background: transparent;border: none;">
                    <div class="modal-header color-thead-good br-modal-top">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estas seguro de cancelar el pedido?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body color-modal br-modal-bot">
                        <div class="row mb-3">
                            <div class="col-8">Cliente: {{ $order-> nombre }}</div>
                            <div class="col-4 d-lg-flex justify-content-end">Precio: {{ $order-> precio }}</div>
                        </div>
                        <p>Fecha de entrega: {{ Carbon\Carbon::parse($order-> fechaEntrega)->format('d-m-Y') }}</p>
                        <p>Hora de entrega: {{ Carbon\Carbon::parse($order-> horaEntrega)->isoFormat('h:m A') }}</p>
                        <div class="d-flex justify-content-between mt-4 mb-2">

                            <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                            
                            <form method="post" action="{{ route('Order.cancel', $order->id) }}" role="form" enctype="multipart/form-data" class="needs-validation">
                                @csrf
                                {{ method_field('PATCH') }}

                                <input class="d-none" type="number" name="id_sale" value="{{$user}}">
                                <input class="d-none" type="text" name="status" value="cancelado">
                                <button type="submit" class="btn-blue-boton btn-color-verde">Aceptar</button>

                            </form>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

        @endforeach

    </div>
@else
    <h3>No hay pedidos registrados</h3>
@endif

</div>

<!-- Modal Ver más -->

@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- <script type="text/javascript">
    // const formu = document.getElementById("formulario");

    function formularios(event) {

        event.preventDefault();

        Swal.fire({
            title: '¿Estas seguro de eliminar el pedido?',
            text: "No serás capaz de revertir esto!",
            icon: 'warning',
            showDenyButton: true,
            denyButtonColor: '#d33',
            denyButtonText: 'Cancelar acción!',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Si, eliminarlo!'
        }).then((result) => {
            if (result.isConfirmed) {

                this.submit();

            } else if (result.isDenied) {
                Swal.fire(
                    'Cancelado',
                    'Tu registro está a salvo :)',
                    'error'
                )
            }

        })

    }

</script> -->

@if(Session('mensaje') == 'Pedido registrado con éxito')
<script>
    Swal.fire(
        'Pedido registrado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Pedido entregado con éxito')
<script>
    Swal.fire(
        'Pedido entregado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'Pedido cancelado con éxito')
<script>
    Swal.fire(
        'Pedido cancelado con éxito',
        '',
        'success'
    )
</script>
@endif

@endsection