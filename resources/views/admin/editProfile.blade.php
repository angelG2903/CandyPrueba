@extends('layouts.appAdmin')

@section('content')

@if(Session::has('mensaje'))
    <div class="alert alert-danger d-flex justify-content-between align-items-center" role="alert">
        {{ Session::get('mensaje') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container mb-5">
    <div class="row justify-content-center mt-3">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header color-thead-good">Editar perfil</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('editU') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last" class="col-md-4 col-form-label text-md-end">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="last" type="text" class="form-control @error('last_name') is-invalid @enderror" value="{{ Auth::user()->last_name }}" name="last_name">

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Teléfono') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ Auth::user()->phone_number }}" name="phone_number">
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
                                <input id="email" type="email" aria-describedby="emailHelp" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autocomplete="email">
                                <div id="emailHelp" class="form-text">Para cambiar el correo es necesario la <b>contraseña actual.</b></div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Contraseña actual</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password_ac') is-invalid @enderror" name="password_actual" autocomplete="new-password">

                                @error('password_ac')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

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
                        <div id="noteHelp" class="form-text ms-3"><b>Nota: </b>No es necesario cambiar la contraseña si solo modifica el nombre, apellido o teléfono.</div>

                        <div class="row mt-5 mb-2 mx-2">
                            <div class="col-4">
                                <a class="btn-blue-boton btn-color-rojo" href="{{ route('Dashboard') }}">Cancelar</a>
                            </div>
                            <div class="col-8 d-flex justify-content-end">
                                <button type="submit" class="btn-blue-boton btn-color-azul">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection