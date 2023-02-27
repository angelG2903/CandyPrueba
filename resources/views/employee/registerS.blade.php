@extends('layouts.appRegister')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <!-- Tabla de los pasteles d-flex justify-content-center-->
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">

            <h5>Pasteles Vendidos</h5>
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
                    <tr class="color-border-b">
                        <th scope="row">1</th>
                        <td>3 Leches</td>
                        <td>Grande</td>
                        <td>05/02/2023</td>
                        <td>Lunes</td>
                        <td>320</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <a class="f-icon-delete"><i class="bi bi-trash"></i></a>

                            </div>
                        </td>
                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Chocolate</td>
                        <td>Mediano</td>
                        <td>05/02/2023</td>
                        <td>Martes</td>
                        <td>300</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <a class="f-icon-delete"><i class="bi bi-trash"></i></a>

                            </div>
                        </td>

                    </tr>
                    <tr class="color-footer-b">
                        <th scope="row" colspan="5">Total</th>
                        <td colspan="2" class="fw-bold">620</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Tabla velitas -->
    <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
        <div class="col-sm-12 col-md-7 col-lg-5">

            <h5>Velas vendidas</h5>
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
                    <tr class="color-border-b">
                        <th scope="row">1</th>
                        <td>Velita Número</td>
                        <td>20</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <a class="f-icon-delete"><i class="bi bi-trash"></i></a>

                            </div>
                        </td>
                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Vela Magi</td>
                        <td>15</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="f-icon-edit mx-2"><i class="bi bi-pencil"></i></a>
                                <a class="f-icon-delete"><i class="bi bi-trash"></i></a>

                            </div>
                        </td>
                    </tr>
                    <tr class="color-footer-b">
                        <th scope="row" colspan="2">Total</th>
                        <td colspan="2" class="fw-bold">35</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <div class="row d-flex justify-content-center mt-4 mb-5 mx-2">

        <div class="col-sm-12 col-lg-6 total-venta d-flex justify-content-between py-1">
            <h4 class="mb-0 ps-2">Total: 995</h4>
            <h4 class="mb-0 pe-2">04/02/2023</h4>
        </div>

    </div>

</div>

<!-- Modal Registrar venta  pastel-->
<div class="modal fade" id="registrarP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: transparent;border: none;">
            <div class="modal-header color-navbar br-modal-top">
                <h5 class="modal-title" id="exampleModalLabel">Venta Pastel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body color-modal br-modal-bot">

                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sabor</label>
                        <select class="form-select borde" aria-label="Default select example" id="sabor" required>
                            <option selected>Seleccione un sabor</option>
                            <option value="1">3 leches</option>
                            <option value="2">Combinado</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Tamaño</label>
                        <select class="form-select borde" aria-label="Default select example" id="tama" required>
                            <option selected>Seleccione un tamaño</option>
                            <option value="1">Grande</option>
                            <option value="2">Mediano</option>
                            <option value="3">Chico</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tamano" class="form-label">Etiqueta</label>
                        <select class="form-select borde" aria-label="Default select example" id="etiqueta" required>
                            <option selected>Seleccione la etiqueta</option>
                            <option value="1">Lunes</option>
                            <option value="2">Martes</option>
                            <option value="3">Miercoles</option>
                            <option value="4">Jueves</option>
                            <option value="5">Viernes</option>
                            <option value="6">Sabado</option>
                            <option value="7">Domingo</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Precio</label>
                        <input type="number" class="form-control borde" id="exampleInputPassword1">
                    </div>
                    <div class="d-flex justify-content-end mt-5 mb-2">
                        <button type="button" class="btn-blue-boton btn-color-rojo me-3" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn-blue-boton btn-color-azul px-3 me-1" data-bs-dismiss="modal">Registrar</button>

                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<!-- Modal venta Velas -->
<div class="modal fade" id="vela" tabindex="-1" aria-labelledby="velasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: transparent;border: none;">
            <div class="modal-header color-navbar br-modal-top">
                <h5 class="modal-title" id="velasLabel">Venta Velitas</h5>
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