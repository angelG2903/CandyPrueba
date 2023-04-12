@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <div class="row mt-4 me-1">
        <div class="d-flex justify-content-end">
            <!-- <a href="" class="btn-blue-boton btn-color-azul" data-bs-toggle="modal" data-bs-target="#registrarUsuarios">Agregar usuario</a> -->
            <a href="{{ route('register') }}" class="btn-blue-boton btn-color-azul" >Agregar empleado</a>
        </div>

    </div>

@if(!empty($users))
    <!-- Tabla de los pasteles d-flex justify-content-center-->
    <div class="row mt-2 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Empleados registrados</h5>
            <table class="table table-borderless">
                <thead class="color-thead-good">
                    <tr>
                        <th scope="col" class="bordes-t-l">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col" class="bordes-t-r"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 1;
                    @endphp
                    @foreach($users as $user)
                    <tr class="color-border-b">
                        <th scope="row">{{ $cont }}</th>
                        <td>{{ $user -> name }}</td>
                        <td>{{ $user -> last_name }}</td>
                        <td>{{ $user -> phone_number }}</td>
                        <td>{{ $user -> email }}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('RegisterEmployee.edit',$user->id) }}" class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <button type="button" class="f-icon-delete" data-bs-toggle="modal" data-bs-target="#borrarV-{{$user ->id}}" style="border: 0;"><i class="bi bi-trash"></i></button>

                            </div>
                        </td>
                        
                    </tr>

                    <!-- Borrar cuenta empleado -->
                    <div class="modal fade" id="borrarV-{{$user ->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="background: transparent;border: none;">
                                <div class="modal-header color-pregun br-modal-top">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">¿Estás seguro de eliminar esta cuenta?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body color-modal br-modal-bot">
                                    <div class="row mb-3">
                                        <div class="col-6">Nombre: {{ $user->name }}</div>
                                        <div class="col-6 d-lg-flex justify-content-end">Teléfono: {{ $user->phone_number }}</div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-8">Apellidos: {{ $user->last_name }} </div>
                                        <div class="col-4"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">Correo: {{ $user->email }}</div>
                                    </div>


                                    <div class="d-flex justify-content-between mt-5 mb-2">
                                        <button type="button" class="btn-blue-boton btn-color-rojo" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('RegisterEmployee.destroy',$user ->id)}}" class="d-none" method="post">
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
                    @endphp
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@else
    <div class="row mt-3">
        <div class="col-12 text-center">
            <h3>No hay usuarios registrados</h3>
        </div>
    </div>
@endif

</div>


@endsection

@section('js')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(Session('mensaje') == 'EliminarUser')
<script>
    Swal.fire(
        'Empleado eliminado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'actualizado')
<script>
    Swal.fire(
        'Empleado actualizado con éxito',
        '',
        'success'
    )
</script>
@endif

@if(Session('mensaje') == 'nada')
<script>
    Swal.fire(
        'No hubo ningun cambio en el perfil del empleado',
        '',
        'success'
    )
</script>
@endif

@endsection