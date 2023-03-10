

<div class="mb-3 d-none">
    <label for="id_user" class="form-label">Id_user</label>
    <input type="text" class="form-control borde" value="{{ isset($user)?$user:$datacake-> id_user }}" name="id_user" id="id_user">

</div>


<div class="mb-3">
    <label for="sabor" class="form-label">Sabor</label>
    <select class="form-select borde" aria-label="Default select example" name="sabor" id="sabor" required>
        <option selected>{{ isset($datacake-> sabor)?$datacake-> sabor:'Seleccione un sabor'}}</option>
        <option value="3 leches" {{ old('sabor') == '3 leches' ? 'selected' :old('sabor') }}>3 leches</option>
        <option value="Combinado" {{ old('sabor') == 'Combinado' ? 'selected' :old('sabor') }}>Combinado</option>
        <option value="Fresas" {{ old('sabor') == 'Fresas' ? 'selected' :old('sabor') }}>Fresas</option>
        <option value="Galleta" {{ old('sabor') == 'Galleta' ? 'selected' :old('sabor') }}>Galleta</option>
    </select>
</div>
<div class="mb-3">
    <label for="tamanio" class="form-label">Tamaño</label>
    <select class="form-select borde" aria-label="Default select example" name="tamanio" id="tamanio" required>
        <option selected>{{ isset($datacake-> tamanio)?$datacake-> tamanio:'Seleccione un tamaño'}}</option>
        <option value="Grande" {{ old('tamanio') == 'Grande' ? 'selected' :old('tamanio') }}>Grande</option>
        <option value="Mediano" {{ old('tamanio') == 'Mediano' ? 'selected' :old('tamanio') }}>Mediano</option>
        <option value="Chico" {{ old('tamanio') == 'Chico' ? 'selected' :old('tamanio') }}>Chico</option>
    </select>
</div>
<div class="mb-3">
    <label for="etiqueta" class="form-label">Etiqueta</label>
    <select class="form-select borde" aria-label="Default select example" name="etiqueta" id="etiqueta" required>
        <option selected>{{ isset($datacake-> etiqueta)?$datacake-> etiqueta:'Seleccione la etiqueta'}}</option>
        <option value="Lunes" {{ old('etiqueta') == 'Lunes' ? 'selected' :old('etiqueta') }}>Lunes</option>
        <option value="Martes" {{ old('etiqueta') == 'Martes' ? 'selected' :old('etiqueta') }}>Martes</option>
        <option value="Miercoles" {{ old('etiqueta') == 'Miercoles' ? 'selected' :old('etiqueta') }}>Miercoles</option>
        <option value="Jueves" {{ old('etiqueta') == 'Jueves' ? 'selected' :old('etiqueta') }}>Jueves</option>
        <option value="Viernes" {{ old('etiqueta') == 'Viernes' ? 'selected' :old('etiqueta') }}>Viernes</option>
        <option value="Sabado" {{ old('etiqueta') == 'Sabado' ? 'selected' :old('etiqueta') }}>Sabado</option>
        <option value="Domingo" {{ old('etiqueta') == 'Domingo' ? 'selected' :old('etiqueta') }}>Domingo</option>
    </select>
</div>
<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" min="180" max="450" value="{{ isset($datacake-> precio)?$datacake-> precio:old('precio') }}" class="form-control borde @error('precio') is-invalid @enderror" name="precio" id="precio">

    @error('precio')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>

