@extends('layouts.appAdmin')

@section('content')

<!-- Contenido de la pagina -->
<div class="container">


    <!-- Tabla de los pasteles -->
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Pasteles frescos</h5>
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

            <h5>Velas</h5>
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

    <!-- Tabla de los pasteles rezagados -->
    <div class="row mt-4 mb-4 d-flex justify-content-center">
        <div class="col-sm-12 col-lg-10 table-responsive-sm">
            <h5>Pasteles rezagados</h5>
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


</div>






@endsection