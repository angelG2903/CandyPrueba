
<div class="mb-3 d-none">
    <label for="id_user" class="form-label">Id_user</label>
    <input type="text" class="form-control borde" value="{{ isset($user)?$user:$datacandle-> id_user }}" name="id_user" id="id_user">

</div>

<div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <select class="form-select borde " aria-label="Default select example" name="nombre" id="nombre" required>
        <option selected>{{ isset($datacandle-> nombre)?$datacandle-> nombre:'Seleccione el nombre'}}</option>
        <option value="Vela número" {{ old('nombre') == 'Vela número' ? 'selected' :old('nombre') }}>Vela número</option>
        <option value="Vela Magi" {{ old('nombre') == 'Vela Magi' ? 'selected' :old('nombre') }}>Vela Magi</option>
        
    </select>
    
</div>
<div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" step="0.01" min="15" max="30" value="{{ isset($datacandle-> precio)?$datacandle-> precio:old('precio') }}" class="form-control borde @error('precio') is-invalid @enderror" name="precio" id="precio">

    @error('precio')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>