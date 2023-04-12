@extends('layouts.appAdmin')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header color-thead-good">Editar empleado</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('RegisterEmployee.update', $employee->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        
                        {{ method_field('PATCH') }}

                        @include('admin.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection