@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">

    <div class="row d-flex justify-content-center mt-4">
        <div class="col-10">
            <form>
                <div class="row">
                    <div class="col-sm-12 col-lg-auto">
                        <label for="fecha" class="form-label">Introduzca la fecha para ver el corte</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <input type="date" class="form-control" id="fecha">
                    </div>

                    <div class="d-none d-md-block col-md-auto col-lg-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-12 d-md-none d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>


            </form>
        </div>


    </div>

    <!-- Tabla de los pasteles d-flex justify-content-center-->
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Pasteles vendidos</h5>
            <table class="table table-borderless">
                <thead class="color-thead-p">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sabor</th>
                        <th scope="col">Tamaño</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Etiqueta</th>
                        <th scope="col">Precio</th>
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

                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Chocolate</td>
                        <td>Mediano</td>
                        <td>05/02/2023</td>
                        <td>Martes</td>
                        <td>300</td>


                    </tr>
                    <tr class="color-footer-b">
                        <th scope="row" colspan="5">Total</th>
                        <td class="fw-bold">620</td>
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
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-border-b">
                        <th scope="row">1</th>
                        <td>Velita Número</td>
                        <td>20</td>

                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Vela Magi</td>
                        <td>15</td>

                    </tr>
                    <tr class="color-footer-b">
                        <th scope="row" colspan="2">Total</th>
                        <td class="fw-bold">35</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Tabla pedidos -->
    <div class="row  mt-4 d-flex justify-content-center table-responsive-sm">
        <div class="col-sm-12 col-md-7 col-lg-6">

            <h5>Anticipo de pedidos</h5>
            <table class="table table-borderless">
                <thead class="color-thead-p">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre del cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Anticipo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-border-b">
                        <th scope="row">1</th>
                        <td>Javier Tellez</td>
                        <td>07/02/2023</td>
                        <td>300</td>

                    </tr>
                    <tr class="color-border-b">
                        <th scope="row">2</th>
                        <td>Pedro Castro</td>
                        <td>07/02/2023</td>
                        <td>200</td>

                    </tr>
                    <tr class="color-footer-b">
                        <th scope="row" colspan="3">Total</th>
                        <td class="fw-bold">500</td>
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



@endsection