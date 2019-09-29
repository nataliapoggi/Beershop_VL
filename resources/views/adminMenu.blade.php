@extends('layouts.app')

@section('title')
  Admin Menu - BeerShop
@endsection

@section('content')

      <!--main role="main" class="inner cover"-->

       <div class="container marketing">
         <ul>
           <li>
             <hr class="featurette-divider">
             <div class="row featurette col-md-2">
                 <p class="lead"><a href="{{ route('commentList') }}"> Comentarios</a></p>
             </div>
           </li>
           <li>
             <hr class="featurette-divider">
             <div class="row featurette col-md-2">
                 <p class="lead"><a href="{{ route('productList') }}">Productos</a></p>
             </div>
           </li>
           <li>
             <hr class="featurette-divider">
             <div class="row featurette col-md-2">
                 <p class="lead"><a href="{{ route('userList') }}">Usuarios</a></p>
             </div>
           </li>
           <li>
             <hr class="featurette-divider">
             <div class="row featurette col-md-2">
                 <p class="lead"><a href="{{ route('orderList') }}">Pedidos</a></p>
             </div>
           </li>
           <li>
             <hr class="featurette-divider">
             <div class="row featurette col-md-2">
                 <p class="lead"><a href="{{ route('deliveryList') }}">Envios</a></p>
             </div>
           </li>
         </ul>
       </div>
@endsection
