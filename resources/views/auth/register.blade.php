
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="identification_number" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input id="identification_number" type="text" class="form-control @error('identification_number') is-invalid @enderror" name="identification_number" value="{{ old('identification_number') }}" required autocomplete="identification_number" autofocus>

                                @error('identification_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Imagen de Perfil') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="file" class="@error('avatar') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar" autofocus>

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Elige tu Rol') }}</label>

                            <div class="col-md-6">
                                <select id="role" onchange="roleChanged(this);" class="form-control @error('role') is-invalid @enderror" name="role" required autocomplete="role">

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <option value="passenger">Pasajero</option>
                                <option value="driver">Chofer</option>

                                </select>
                            </div>

                        </div>
                        <div class="form-group row" id="brand_name" style="display: none;">
                            <label for="brand_name" class="col-md-4 col-form-label text-md-right">{{ __('Marca de tu Auto') }}</label>

                            <div class="col-md-6">
                                <input id="brand_name" type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name" value="{{ old('brand_name') }}" autocomplete="brand_name" autofocus>

                                @error('brand_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="patent" style="display: none;">
                            <label for="patent" class="col-md-4 col-form-label text-md-right">{{ __('Patente de tu Auto') }}</label>

                            <div class="col-md-6">
                                <input id="patent" type="text" class="form-control @error('patent') is-invalid @enderror" name="patent" value="{{ old('patent') }}" autocomplete="patent" autofocus>

                                @error('patent')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" id="work_from_hour" style="display: none;">
                            <label for="work_from_hour" class="col-md-4 col-form-label text-md-right">{{ __('Hora en la que empezas a trabajar(La hora en la que dejes de trabajar sera 8 hs despues)') }}</label>

                            <div class="col-md-6">
                                <input id="work_from_hour" type="text" class="form-control @error('work_from_hour') is-invalid @enderror" name="work_from_hour" value="{{ old('work_from_hour') }}" autocomplete="work_from_hour" autofocus>

                                @error('work_from_hour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
