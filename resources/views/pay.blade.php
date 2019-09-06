@extends('layouts.app')

@section('title')
  Payment - Beersop
@endsection

@section('content')
  
<div class="ContactContainerForm text-center">
<h5 class="mt-2"><i>Total = $ {{$total}} </i></h5>         
</div>
  
<div class="container">
      <form method="POST" action="{{ route('paymentDone') }}">
      {{csrf_field()}}
          <!--div class="col-50"--> 
          <div  style="display:flex;">   
            <div class="payment m-5-10 h-100 w-50">
            <h3 class="text-center"> Dirección de entrega</h3>

            <label for="name"><i class="fa fa-user"></i> Nombre</label>
            <input type="text" id="name" class="form-control  contactInput" name="name" value="{{auth()->user()->fullname()}}" readonly>
        
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" class="form-control contactInput"  name="email" value="{{auth()->user()->email}}" readonly>
            

            <label for="address"><i class="fa fa-address-card-o"></i> Direccion</label>
            
            <input type="text" id="address" value="{{ old('address') }}"class="form-control contactInput @error('address') is-invalid @enderror" name="address" placeholder="Calle 111 Piso 1 Dto 1 CP1000">
              @error('address')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            
            <label for="city"><i class="fa fa-institution"></i>Provincia</label> <br>
            <select name="city" class="contactInputWidth">
                    <option value="CAP" selected> Capital Federal</option>
                    <option value="BA" > Buenos Aires</option>
            </select> <br>
            <label for="phone"><i class="fa fa-phone"></i></label>
            
            <input type="text" id="phone" value="{{ old('phone') }}"class="form-control contactInput @error('phone') is-invalid @enderror" name="phone" placeholder="tel solo números">
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>  
        

        <!--div class="col-50"--> 
        <div class="payment m-5-10  h-100 w-50">  
            <h3 class="text-center">Forma de Pago</h3>
            <div class="icon-container mb-1">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
            </div>
            <label for="cardname">Nombre</label>
            <input type="text" id="cardname" value="{{ old('cardname') }}"class="form-control contactInput @error('cardname') is-invalid @enderror" name="cardname" placeholder="Nombre (como figura en la tarjeta)">
              @error('cardname')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <label for="ccnum">Número de Tarjeta</label>
            <input type="text" id="ccnum" value="{{ old('ccnum') }}"class="form-control contactInput @error('ccnum') is-invalid @enderror" name="cardnumber" placeholder="1111222233334444">
             @error('ccnum')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <label for="expmonth">Fecha de vencimiento</label>
            <input type="text" id="expmonth"  value="{{ old('expmonth') }}" class="form-control contactInput @error('expmonth') is-invalid @enderror" name="expmonth" placeholder="MM/YY">
            ||@error('ccnum')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            <label for="cvv">SEG</label>
            <input type="text" id="cvv" class="form-control contactInput @error('cvv') is-invalid @enderror" name="cvv" placeholder="123">
            @error('cvv')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>  
        
      <div class="text-center">  
        <input type="submit" id="contactButton" class="btn btn-primary"  style="margin-top: 30px;" value="Confirmar compra" >
      </div> 
      </form>
    </div>

</div>
@endsection
