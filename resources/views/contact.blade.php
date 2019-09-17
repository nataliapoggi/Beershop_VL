@extends('layouts.app')

@section('title')
  Contact Page - BeerShop
@endsection

@section('content')

          <div class="ContactContainerForm text-center">
          <div class="ContactTopText">
                  <h2>Necesita ayuda?</h2>
                  <p>Por favor deje su información y nos pondremos en contacto.</p>
              </div>
              <div class="contactForm">
                <form  name="contactForm" id="contactForm" action="{{ route('contact') }}"  method="post">
                {{csrf_field()}}  
                <fieldset>
                    <label for="name">Nombre</label>
                     <input class="contactInput"  type="text" name="name"  onblur="validate('name')" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" >
                     @error('name')
                      <div class="invalid-feedback  d-block">{{ $message}}</div>
                     @enderror
                     <p class="js-error" id="errorName"><ion-icon name="alert"></ion-icon>El nombre debe tener al menos 2 caracteres</p>
                </fieldset>
                <fieldset>
                    <label for="lname">Apellido</label>
                    <input class="contactInput"   type="text" name="lname" onblur="validate('lname')" value="{{ old('lname') }}" class="form-control @error('lname') is-invalid @enderror" >
                    @error('lname')
                      <div class="invalid-feedback  d-block">{{ $message }}</div>
                    @enderror
                    <p class="js-error" id="errorLname"><ion-icon name="alert"></ion-icon>El apellido debe tener al menos 2 caracteres</p>
                </fieldset>
                <fieldset>
                    <label for="Email" style="margin-right:20px;">Email</label>
                    <input class="contactInput"   type="text" name="email" onblur="validate('email')"value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" >
                    @error('email')
                      <div class="invalid-feedback  d-block">{{ $message }}</div>
                    @enderror
                    <p class="js-error" id="errorEmail"><ion-icon name="alert"></ion-icon>Por favor ingrese un Email válido</p>
                </fieldset>
                <fieldset>
                  <label>Comentarios/Preguntas <br>
                  <textarea class="contatTextArea" name="comment" onblur="validate('comment')"rows="8" cols="36" value="{{ old('comment') }}"></textarea>
                     @error('comment')
                      <div class="invalid-feedback  d-block">{{ $message }}</div>
                     @enderror
                     <p class="js-error" id="errorComment"><ion-icon name="alert"></ion-icon>El comentario NO puede estar vacío</p>
                  </label>
                  </fieldset>
                  <input id ="contactButton" type="submit" value="Enviar">
                </form>
                <br>
              </div>
<script src="js/contactFormValidation.js"> </script>     
@endsection