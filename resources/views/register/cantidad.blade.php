<div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad</label>
    <input type="number" min="1" max="10" class="form-control borde @error('cantidad') is-invalid @enderror" name="cantidad" id="cantidad">

    @error('cantidad')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

</div>