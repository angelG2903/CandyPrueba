@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <div class="row mt-4 me-1">
        <div class="d-flex justify-content-end">
            <a href="" class="btn-blue-boton btn-color-azul" data-bs-toggle="modal" data-bs-target="#registrarUsuarios">Agregar usuario</a>
        </div>

    </div>

    <!-- Tabla de los pasteles d-flex justify-content-center-->
    <div class="row mt-2 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Usuarios registrados</h5>
            <table class="table table-borderless">
                <thead class="color-thead-p">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-border-b">
                        <th scope="row">1</th>
                        <td>Angel</td>
                        <td>Muñoz Chávez</td>
                        <td>2241164050</td>
                        <td>angel@gmail.com</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <a class="f-icon-delete"><i class="bi bi-trash"></i></a>

                            </div>
                        </td>
                        
                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Pedro</td>
                        <td>Castro Adan</td>
                        <td>2251168952</td>
                        <td>pedro@gmail.com</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <a class="f-icon-delete"><i class="bi bi-trash"></i></a>

                            </div>
                        </td>
                        

                    </tr>
                    
                </tbody>
            </table>

        </div>
    </div>

</div>





<!-- Modal Registrar usuario-->
<div class="modal fade" id="registrarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="background: transparent;border: none;">
                <div class="modal-header color-navbar br-modal-top">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body color-modal br-modal-bot">

                    <form>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nombre</label>
                            <input type="text" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Apellidos</label>
                            <input type="text" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Teléfono</label>
                            <input type="number" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Correo</label>
                            <input type="email" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                            <input type="password" class="form-control borde" id="exampleInputPassword1">
                        </div>
                        <div class="d-flex justify-content-end mt-5 mb-2">
                            <button type="button" class="btn-blue-boton btn-color-rojo me-3"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn-blue-boton btn-color-azul px-3 me-1"
                                data-bs-dismiss="modal">Registrar</button>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

@endsection