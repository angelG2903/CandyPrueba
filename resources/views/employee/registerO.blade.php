@extends('layouts.appEm')

@section('content')
<div class="container">
    <!-- Alineamos todo el contenido al centro -->
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12 col-md-7 col-lg-8 pt-4 p-5">
            <form action="home.php" method="POST" class="needs-validation">
                <!-- Nombre del cliente id: nombreC -->
                <div class="mb-3">
                    <label for="nombreC" class="form-label">Nombre del cliente</label>
                    <input type="text" class="form-control borde" id="nombreC" required>

                </div>
                <!-- Número de teléfono id: numeroT -->
                <div class="mb-3">
                    <label for="numeroT" class="form-label">Número de teléfono</label>
                    <input type="number" class="form-control borde" id="numeroT" required>

                </div>
                <!-- Dirección id: direccion -->
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <textarea class="form-control borde" id="direccion" rows="3" required></textarea>

                </div>

                <!-- Sabor id: sabor -->
                <div class="mb-3">
                    <label for="sabor" class="form-label">Sabor</label>
                    <select class="form-select borde" aria-label="Default select example" id="sabor" required>
                        <option selected>Seleccione un sabor</option>
                        <option value="1">3 leches</option>
                        <option value="2">Combinado</option>
                    </select>

                </div>

                <!-- Relleno id: relleno -->
                <div class="mb-3">
                    <label for="relleno" class="form-label">Relleno</label>
                    <input type="text" class="form-control borde" id="relleno" required>

                </div>
                <!-- Rebanadas id: rebanadas -->
                <div class="mb-3">
                    <label for="rebanadas" class="form-label">Rebanadas</label>
                    <input type="text" class="form-control borde" id="rebanadas" required>

                </div>
                <!-- Decoración id: decoracion -->
                <div class="mb-3">
                    <label for="decoracion" class="form-label">Decoración</label>
                    <textarea class="form-control borde" id="decoracion" rows="3" required></textarea>

                </div>
                <!-- Precio id: precio -->
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control borde" id="precio" required>

                </div>
                <!-- Anticipo id: anticipo -->
                <div class="mb-3">
                    <label for="anticipo" class="form-label">Anticipo</label>
                    <input type="number" class="form-control borde" id="anticipo" required>

                </div>
                <!-- Fecha id: fecha -->
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control borde" id="fecha" required>

                </div>

                <!-- Fecha id: hora -->
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="time" class="form-control borde" id="fecha" required>

                </div>


                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>

                </div>
                <div class="d-flex justify-content-end">
                    <a href="home.html" class="btn-blue-boton btn-color-rojo me-3">Cancelar</a>
                    <button type="submit" class="btn-blue-boton btn-color-azul">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection