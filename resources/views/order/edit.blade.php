@extends('layouts.appEm')


@section('content')
<div class="container">
    <!-- Alineamos todo el contenido al centro -->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-7 col-lg-8 pt-4 p-5">

            <h2 class="mb-4">Editar pedido</h2>
            <form method="POST" action="{{ route('Order.update', $dataOrder->id) }}" role="form" enctype="multipart/form-data" class="needs-validation">
                @csrf
                {{ method_field('PATCH') }}

                @include('order.form', ['ruta'=>'OrderI', 'boton'=>'Editar'] )

            </form>

        </div>
    </div>

</div>
@endsection