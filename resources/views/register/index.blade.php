@extends('layouts.appRegister')

@section('content')

@if(Session::has('mensaje'))
<div class="alert alert-success d-flex justify-content-between align-items-center mx-2" role="alert">
    {{ Session::get('mensaje') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="container">

    <!-- Tabla de los pasteles d-flex justify-content-center-->
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Pasteles registrados</h5>
            <table class="table table-borderless">
                <thead class="color-thead-p">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sabor</th>
                        <th scope="col">Tamaño</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Etiqueta</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
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
                                <a href="{{ route('Product.edit',$cake->id) }}" class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <!-- <a class="f-icon-delete"><i class="bi bi-trash"></i></a> -->
                                <form action="{{ route('Product.destroy',$cake ->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <!-- <button class="f-icon-delete" type="submit" onclick="return confirm('¿Quieres borrar')"><i class="bi bi-trash"></i></button> -->
                                    <!-- <input type="submit" onclick="return confirm('¿Quieres borrar')"> -->
                                    <button type="submit" class="f-icon-delete" style="border: 0;" onclick="return confirm('¿Quieres borrar')"><i class="bi bi-trash"></i></button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @php
                    $cont++;
                    $total+= ($cake -> precio);
                    @endphp
                    @endforeach
                    <tr class="color-footer-b">
                        <th scope="row" colspan="5">Total</th>
                        <td colspan="2" class="fw-bold">{{$total}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Tabla velitas -->
    <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
        <div class="col-sm-12 col-md-7 col-lg-5">

            <h5>Velitas registradas</h5>
            <table class="table table-borderless">
                <thead class="color-thead-p">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
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
                                <a href="{{ route('Product.editC',$candle->id) }}" class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>

                                <form action="{{ route('Product.destroyC',$candle ->id)}}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <!-- <button class="f-icon-delete" type="submit" onclick="return confirm('¿Quieres borrar')"><i class="bi bi-trash"></i></button> -->
                                    <!-- <input type="submit" onclick="return confirm('¿Quieres borrar')"> -->
                                    <button type="submit" class="f-icon-delete" style="border: 0;" onclick="return confirm('¿Quieres borrar')"><i class="bi bi-trash"></i></button>
                                </form>

                            </div>
                        </td>
                    </tr>
                
                    @php
                    $contC++;
                    $totalC+= ($candle -> precio);
                    @endphp
                    @endforeach
                    <tr class="color-footer-b">
                        <th scope="row" colspan="2">Total</th>
                        <td colspan="2" class="fw-bold">{{$totalC}}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

</div>



<!-- Modal Velas u otros-->
<div class="modal fade" id="vela" tabindex="-1" aria-labelledby="velasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: transparent;border: none;">
            <div class="modal-header color-navbar br-modal-top">
                <h5 class="modal-title" id="velasLabel">Registrar Velitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body color-modal br-modal-bot">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nombre</label>
                        <select class="form-select borde" aria-label="Default select example" id="nombre" required>
                            <option selected>Seleccione una opción</option>
                            <option value="1">Vela número</option>
                            <option value="2">Vela Magi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="d-flex justify-content-end mt-4 mb-2">
                        <button type="button" class="btn-blue-boton btn-color-rojo me-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn-blue-boton btn-color-azul px-3 me-1" data-bs-dismiss="modal">Registrar</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection