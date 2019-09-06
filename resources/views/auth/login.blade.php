@extends('layouts.app')

@section('content')
<div class="ContactContainerForm text-center">
<div class="ContactTopText">      
    <div class="row justify-content-center">
        <div class="col-md-8">
        <br><br>   
                    <form method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control contactInput @error('email') is-invalid @enderror" name="email" onblur="validate('email')" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorEmail">Por favor ingrese un Email válido</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right ">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control contactInput @error('password') is-invalid @enderror" name="password" onblur="validate('password')" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <p class="js-error" id="errorPassword"> Debe ingresar el password (min 8 caracteres)</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                         
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" id="contactButton" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Olvidaste tu Password?') }}
                                    </a>
                                @endif
                            </div>
                            <br> <br>
                        </div>
                    </form>
            
        </div>
    </div>
</div>
</div>
<script src="../js/loginFormValidation.js"> </script>                   
@endsection
