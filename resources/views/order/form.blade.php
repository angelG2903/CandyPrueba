
@if(count($errors)>0)

    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>

    
        
    
@endif


<div class="mb-3 d-none">
    <label for="id_u" class="form-label">Id_user</label>
    <input type="text" class="form-control borde" value="{{ isset($user)?$user:$dataOrder-> id_user }}" name="id_user" id="id_u" >

</div>
<!-- Nombre del cliente id: nombreC -->
<div class="mb-3">
    <label for="nombreC" class="form-label">Nombre del cliente</label>
    <input type="text" class="form-control borde" value="{{ isset($dataOrder-> nombre)?$dataOrder-> nombre:old('nombre') }}" name="nombre" id="nombreC" >

</div>
<!-- Número de teléfono id: numeroT -->
<div class="mb-3">
    <label for="numeroT" class="form-label">Número de teléfono</label>
    <input type="number" class="form-control borde" value="{{ isset($dataOrder-> telefono)?$dataOrder-> telefono:old('telefono') }}" name="telefono" id="numeroT" >

</div>
<!-- Dirección id: direccion -->
<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <textarea class="form-control borde" name="direccion" id="direccion" rows="3" >{{ isset($dataOrder-> direccion)?$dataOrder-> direccion:old('direccion') }}</textarea>

</div>

<!-- Sabor id: sabor -->
<div class="mb-3">
    <label for="sabor" class="form-label">Sabor</label>
    <select class="form-select borde" aria-label="Default select example" value="{{ isset($dataOrder-> sabor)?$dataOrder-> sabor:old('sabor') }}" name="sabor" id="sabor" >
        <option selected>{{ isset($dataOrder-> sabor)?$dataOrder-> sabor:'Seleccione un sabor' }}</option>
        <option value="1">3 leches</option>
        <option value="2">Combinado</option>
    </select>

</div>

<!-- Relleno id: relleno -->
<div class="mb-3">
    <label for="relleno" class="form-label">Relleno</label>
    <input type="text" class="form-control borde" value="{{ isset($dataOrder-> relleno)?$dataOrder-> relleno:old('relleno') }}" name="relleno" id="relleno" >

</div>
<!-- Rebanadas id: rebanadas -->
<div class="mb-3">
    <label for="rebanadas" class="form-label">Rebanadas</label>
    <input type="text" class="form-control borde" value="{{ isset($dataOrder-> rebanadas)?$dataOrder-> rebanadas:old('rebanadas') }}" name="rebanadas" id="rebanadas" >

</div>
<!-- Decoración id: decoracion -->
<div class="mb-3">
    <label for="decoracion" class="form-label">Decoración</label>
    <textarea class="form-control borde" name="decoracion" id="decoracion" rows="3" >{{ isset($dataOrder-> decoracion)?$dataOrder-> decoracion:old('decoracion') }}</textarea>

</div>
<!-- Precio id: precio -->
<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" class="form-control borde" value="{{ isset($dataOrder-> precio)?$dataOrder-> precio:old('precio') }}" name="precio" id="precio" >

</div>
<!-- Anticipo id: anticipo -->
<div class="mb-3">
    <label for="anticipo" class="form-label">Anticipo</label>
    <input type="number" class="form-control borde" value="{{ isset($dataOrder-> anticipo)?$dataOrder-> anticipo:old('anticipo') }}" name="anticipo" id="anticipo" >

</div>
<!-- Fecha id: fecha -->
<div class="mb-3">
    <label for="fecha" class="form-label">Fecha</label>
    <input type="date" class="form-control borde" value="{{ isset($dataOrder-> fechaEntrega)?$dataOrder-> fechaEntrega:old('fechaEntrega') }}" name="fechaEntrega" id="fecha" >

</div>

<!-- Fecha id: hora -->
<div class="mb-3">
    <label for="hora" class="form-label">Hora</label>
    <input type="time" class="form-control borde" value="{{ isset($dataOrder-> horaEntrega)?$dataOrder-> horaEntrega:old('horaEntrega') }}" name="horaEntrega" id="hora" >

</div>


<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1" >
    <label class="form-check-label" for="exampleCheck1">Check me out</label>

</div>
<div class="d-flex justify-content-end">
    <a href="{{ route($ruta) }}" class="btn-blue-boton btn-color-rojo me-3">Cancelar</a>
    <button type="submit" class="btn-blue-boton btn-color-azul">{{$boton}}</button>
</div>