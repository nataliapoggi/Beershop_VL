@extends('layouts.app')

@section('title')
  Invoice - BeerShop
@endsection

@section('content')

<div class="ContactContainerForm text-center">
<br>
      
      <!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
<div class="container">

<div class="row">
<main class="col-sm-12">
<!-- company info -->
    <div>
        <h1 class="text-left"><ion-icon name="beer"></ion-icon>&nbsp Beershop S.A</h4>
        <h4 class="text-muted text-left">Calle de la cerveza 1111 CP1000</h2>
        <h4 class="text-muted text-left">Buenos Aires - Argentina</h2>
        <h4 class="text-muted text-left"> CUIT: 30-33333333-3</h2>
        <h4 class="text-muted text-left">IIBB: 333333333</h2>
        <h4 class="text-muted text-left">Inicio de actividades: 01/01/1019</h2>
    </div>
    <hr>

<!-- invoice Nro  -->        
    <div>
        <h2>Factura: 001- <?= sprintf("%'.09d\n", $orderHd->order_id) ?></h2>
        <h4>Fecha: {{ date('d-m-Y', strtotime($orderHd->created_at))}}  </h4>
    </div>
    <hr>

<!-- customer  info -->    
    <div>
        <h3 class="text-capitalize text-left"><strong>Datos Cliente </strong><h3> 
        <h3 class="text-capitalize text-left"><em> {{$orderHd->username}} </em></h3>
        <h5 class="text-muted text-capitalize text-left"><strong>Direccion: </strong>{{$orderAdd->adr}} , {{$orderAdd->city}} </h5>
        <h5 class="text-muted text-left"><strong>Teléfono: </strong>{{$orderAdd->phone}} </h5>
    </div>

<div class="card">

<div>
<div class="card">
<table class="table table-hover">
<thead class="text-muted">
<tr>
  <th scope="col" width="120">Producto</th>
  <th scope="col" width="120">Cantidad</th>
  <th scope="col" width="120">Precio</th>
  <th scope="col" width="120">Total</th>
</tr>
</thead>
<tbody>
    @foreach ($orderDt as $item)
    <tr>
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
<p class="text-right" style="margin-right: 100px;"> <strong> <em> Total: $ {{$orderHd->total}} </em> </strong></p>
</div> <!-- card.// -->

<div class="text-center"><br>
          <button class="btn btn-secondary" onclick="printPDF()">Guardar PDF</button>
        </div>
<br>

<script>
function printPDF(){
            html2canvas(document.body,
            { 
              onrendered:function(canvas)
              {

                  //create image from web page
                  var img = canvas.toDataURL("image/png");
                  //create pdf object and add image to it, and then save
                  var doc = new jsPDF('p', "mm", "legal");
                  var width = doc.internal.pageSize.getWidth();
                  var hratio = canvas.height/canvas.width;
                  var height = width * hratio;
                  doc.size
                  doc.addImage(img,'JPEG',0,0, width, height);
                  doc.output('save', 'invoice.pdf');
              }
              })};
</script>
@endsection
