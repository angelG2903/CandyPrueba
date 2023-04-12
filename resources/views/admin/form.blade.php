<div class="row mb-3">
    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($employee->name)?$employee->name:old('name') }}" autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

    <div class="col-md-6">
        <input id="rol" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ isset($employee->last_name)?$employee->last_name:old('last_name') }}" name="last_name">

        @error('last_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

    <div class="col-md-6">
        <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ isset($employee->phone_number)?$employee->phone_number:old('phone_number') }}" name="phone_number">
        @error('phone_number')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">Correo</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ isset($employee->email)?$employee->email:old('email') }}" autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<!-- password -->
<div class="row mb-3">
    <label for="password1" class="col-md-4 col-form-label text-md-end">Nueva contraseña</label>

    <div class="col-md-6">
        <input id="password1" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3" aria-describedby="noteHelp">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirmar contraseña</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
    </div>
</div>
<div id="noteHelp" class="form-text ms-3 mb-4"><b>Nota: </b>No es necesario cambiar la contraseña si solo modifica el nombre, apellido, teléfono o correo.</div>

<div class="row mb-0">
    <div class="col-md-6 offset-md-4 d-flex justify-content-end">
        <button type="submit" class="btn-blue-boton btn-color-azul">Guardar cambios</button>
    </div>
</div>