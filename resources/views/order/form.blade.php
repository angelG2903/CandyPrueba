
<div class="mb-3 d-none">
    <label for="id_u" class="form-label">Id_user</label>
    <input type="text" class="form-control borde" value="{{ isset($user)?$user:$dataOrder-> id_user }}" name="id_user" id="id_u">

</div>
<div class="mb-3 d-none">
    <label for="id_us" class="form-label">Id_sale</label>
    <input type="text" class="form-control borde" value="{{ isset($user)?$user:$dataOrder-> id_sale }}" name="id_sale" id="id_us">

</div>
<!-- Nombre del cliente id: nombreC -->
<div class="mb-3">
    <label for="nombre" class="form-label">Nombre del cliente</label>
    <input type="text" class="form-control borde @error('nombre') is-invalid @enderror" value="{{ isset($dataOrder-> nombre)?$dataOrder-> nombre:old('nombre') }}" name="nombre" id="nombre">
    @error('nombre')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Número de teléfono id: numeroT -->
<div class="mb-3">
    <label for="numeroT" class="form-label">Número de teléfono</label>
    <input type="number" class="form-control borde @error('telefono') is-invalid @enderror" value="{{ isset($dataOrder-> telefono)?$dataOrder-> telefono:old('telefono') }}" name="telefono" id="numeroT">
    @error('telefono')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Dirección id: direccion -->
<div class="mb-3">
    <label for="direccion" class="form-label">Dirección</label>
    <textarea class="form-control borde @error('direccion') is-invalid @enderror" name="direccion" id="direccion" rows="3">{{ isset($dataOrder-> direccion)?$dataOrder-> direccion:old('direccion') }}</textarea>
    @error('direccion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<div class="mb-3">
    <label for="sabor" class="form-label">Sabor</label>
    <select class="form-select borde @error('sabor') is-invalid @enderror" name="sabor" id="sabor">
        <option value="{{ isset($dataOrder-> sabor)?$dataOrder-> sabor:''}}">{{ isset($dataOrder-> sabor)?$dataOrder-> sabor:'Seleccione un sabor'}}</option>
        <option value="3 leches" {{ old('sabor') == '3 leches' ? 'selected' :old('sabor') }}>3 leches</option>
        <option value="Combinado" {{ old('sabor') == 'Combinado' ? 'selected' :old('sabor') }}>Combinado</option>
    </select>

    @error('sabor')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<!-- Relleno id: relleno -->
<div class="mb-3">
    <label for="relleno" class="form-label">Relleno</label>
    <input type="text" class="form-control borde @error('relleno') is-invalid @enderror" value="{{ isset($dataOrder-> relleno)?$dataOrder-> relleno:old('relleno') }}" name="relleno" id="relleno">
    @error('relleno')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Rebanadas id: rebanadas -->
<div class="mb-3">
    <label for="rebanadas" class="form-label">Rebanadas</label>
    <input type="text" class="form-control borde @error('rebanadas') is-invalid @enderror" value="{{ isset($dataOrder-> rebanadas)?$dataOrder-> rebanadas:old('rebanadas') }}" name="rebanadas" id="rebanadas">
    @error('rebanadas')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Decoración id: decoracion -->
<div class="mb-3">
    <label for="decoracion" class="form-label">Decoración</label>
    <textarea class="form-control borde @error('decoracion') is-invalid @enderror" name="decoracion" id="decoracion" rows="3">{{ isset($dataOrder-> decoracion)?$dataOrder-> decoracion:old('decoracion') }}</textarea>
    @error('decoracion')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Precio id: precio -->
<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" min="0" max="23000" class="form-control borde @error('precio') is-invalid @enderror" value="{{ isset($dataOrder-> precio)?$dataOrder-> precio:old('precio') }}" name="precio" id="precio">
    @error('precio')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Anticipo id: anticipo -->
<div class="mb-3">
    <label for="anticipo" class="form-label">Anticipo</label>
    <input type="number" step="0.01" min="0" max="23000" class="form-control borde @error('anticipo') is-invalid @enderror" value="{{ isset($dataOrder-> anticipo)?$dataOrder-> anticipo:old('anticipo') }}" name="anticipo" id="anticipo">
    @error('anticipo')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>
<!-- Fecha id: fecha -->
<div class="mb-3">
    <label for="fecha" class="form-label">Fecha de entrega</label>
    <input type="date" class="form-control borde @error('fechaEntrega') is-invalid @enderror" value="{{ isset($dataOrder-> fechaEntrega)?$dataOrder-> fechaEntrega:old('fechaEntrega') }}" name="fechaEntrega" id="fecha">
    @error('fechaEntrega')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<!-- Fecha id: hora -->
<div class="mb-5">
    <label for="hora" class="form-label">Hora de entrega</label>
    <input type="time" class="form-control borde @error('horaEntrega') is-invalid @enderror" value="{{ isset($dataOrder-> horaEntrega)?$dataOrder-> horaEntrega:old('horaEntrega') }}" name="horaEntrega" id="hora">
    @error('horaEntrega')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

<div class="d-flex justify-content-end">
    <a href="{{ route($ruta) }}" class="btn-blue-boton btn-color-rojo me-3">Cancelar</a>
    <button type="submit" class="btn-blue-boton btn-color-azul">{{$boton}}</button>
</div>