@extends('layouts.appEm')

@section('template_title')
    Create Order
@endsection

@section('content')
<div class="container">
    <!-- Alineamos todo el contenido al centro -->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-7 col-lg-8 pt-4 p-5">

            <form method="POST" action="{{ route('Order.store') }}" role="form" enctype="multipart/form-data" class="needs-validation">
                @csrf

                @include('order.form')

            </form>

        </div>
    </div>

</div>
@endsection