@extends('layouts.app')

@section('content')
<div class="ContactContainerForm text-center">
<div class="ContactTopText">
      
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
      
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control contactInput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" onblur="validate('name')" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorName"><ion-icon name="alert"></ion-icon>El nombre debe tener al menos 2 caracteres</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control contactInput  @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" onblur="validate('lname')" autofocus>
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorLname"><ion-icon name="alert"></ion-icon>El apellido debe tener al menos 2 caracteres</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control contactInput @error('email') is-invalid @enderror" name="email" onblur="validate('email')"  value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorEmail"><ion-icon name="alert"></ion-icon>Ingrese un Email válido</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control contactInput @error('password') is-invalid @enderror" name="password" onblur="validate('password')" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorPassword"><ion-icon name="alert"></ion-icon>La contraseña debe tener al menos 8 caracteres</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control contactInput" name="password_confirmation" onblur="validate('password_confirmation')" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorPassword_confirmation"><ion-icon name="alert"></ion-icon>No coincide con la contraseña</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bday" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Nacimiento') }}</label>
                            <div class="col-md-6">
                                <input id="bdate" type="date" class="form-control contactInput  @error('bdate') is-invalid @enderror" name="bdate" onblur="validate('bdate')"required>
                                @error('bdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorBdate"><ion-icon name="alert"></ion-icon>Para registrase debe tener 18 años</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="contactButton" class="btn btn-primary"  style="margin-left:80px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
      
</div>
</div>
<script src="../js/registerFormValidation.js"> </script>                   
@endsection
