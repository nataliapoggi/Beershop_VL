@extends('layouts.app')

@section('title')
  Process Payment - BeerShop
@endsection

@section('content')

<div class="ContactContainerForm text-center">
<br>
      
      <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
<div class="container">

<div class="row">
<main class="col-sm-9">
<h3 class="text-capitalize"><strong>Cliente: </strong>
{{$orderHd[0]->username}} &nbsp
<strong>Pedido Nro: </strong>
{{$orderHd[0]->order_id}}
</h3>
<div class="card">

<div>
<div class="card">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col"></th>
  <th scope="col">Producto</th>
  <th scope="col" width="120">Cantidad</th>
  <th scope="col" width="120">Precio</th>
  <th scope="col" width="120">Total</th>
</tr>
</thead>
<tbody>
    @foreach ($orderDt as $item)
    {{$item->product->images}}
    <tr>
	    <td>
      <div class="divImg50 text-center">
        <?php $auxImg= $item->product->image;?>
	      <div class="rounded img50"><img src='{{asset("storage/images/$auxImg")}}'  class="img-thumbnail img-sm"></div>
       </div> 
      </td>
      <td>  
	      <figcaption class="media-body">
		      <h6 class="title text-truncate">{{ $item->product->name}} </h6>
	      </figcaption>
      </td>
      <td>  
      <div class="price-wrap"> 
			<var class="price">{{$item->cant}} </var> 
		  </div> <!-- price-wrap .// -->
	    </td>  
      <td>
		    <div class="price-wrap"> 
			  <var class="price">$ {{$item->price}}</var> 
		    </div> <!-- price-wrap .// -->
	    </td>
      <td>
		  <div class="price-wrap"> 
			<var class="price">$ {{$item->cant * $item->price }} </var> 
		  </div> <!-- price-wrap .// -->
	    </td>
</tr>
@endforeach
</tbody>
</table>
<p> <strong> <em> Total del Pedido: $ {{$orderHd[0]->total}} </em> </strong></p>
</div> <!-- card.// -->

	</main> <!-- col.// -->
<aside class="col-sm-3">
<p class="alert alert-warning orange">Datos del Pago</p>
<dl >
  <dt> {{$orderPay[0]->cardname}} </dt>
</dl>
<dl >
  <dt> {{$orderPay[0]->cardtype}} </dt>
</dl>
<dl>
  <dt>Nro tarj: {{$orderPay[0]->ccnum}}</dt>
</dl>
<p>
  Vto: {{$orderPay[0]->expmonth}}  ---
      CVV: {{$orderPay[0]->cvv}}
</p>
<hr>
<form id="contactForm" action="/paymentFinish" method="post">
{{csrf_field()}}      
<input name="order_id" type="hidden" value={{$orderPay[0]->order_id}}>
<fieldset>
  <label for="confirmation_numb">Código de Confirmación</label>
  <input type="text" name="confirmation_numb" id="confirmation_numb"  onblur="validate('confirmation_numb')" class="contactInput form-control @error('confirmation_numb') is-invalid @enderror" >
  @error('confirmation_numb')
      <div class="invalid-feedback  d-block">{{ $message }}</div>
  @enderror
  <p class="js-error" id="errorConfirmation_numb"><ion-icon name="alert"></ion-icon>El código debe ser numerico, >0 y no puede estar vacio</p>
</fieldset>  
<br>
<button class="btn orange-button" type="submit"><ion-icon name="confirm"></ion-icon>Confirma Pago</button>             
</form>

	</aside> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>

<script src="../js/validateProcessPaymentForm.js"> </script>          
@endsection
