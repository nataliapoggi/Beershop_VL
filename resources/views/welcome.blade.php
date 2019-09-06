@extends('layouts.app')

@section('content')
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <main role="main" class="inner cover">

       <div class="container marketing">


         <!-- START THE FEATURETTES -->

         <hr class="featurette-divider">

         <div class="row featurette">
           <div class="col-md-7">
             <h2 class="featurette-heading">Descubrí! <span class="text-muted"> el mejor eshop para comprar cerveza.</span></h2>
             <p class="lead">Crea tu cuenta y descubrí el mejor eshop dedicado a la venta de cervezas.</p>
           </div>
           <div class="col-md-5">
             <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/index/beer1.jpg')}}"  alt="BeerShop1">
           </div>
         </div>

        <hr class="featurette-divider">

         <div class="row featurette">
           <div class="col-md-7 order-md-2">
             <h2 class="featurette-heading">It is party time!<br><span class="text-muted">Nosotros te ayudamos</span></h2>
             <p class="lead">Completá el formulario de contacto y te asesoraremos para que puedas contratar el mejor servicio de barra para tu evento</p>
           </div>
           <div class="col-md-5 order-md-1">
             <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/index/beer2.jpg')}}"  alt="BeerShop2">
           </div>
         </div>

         <hr class="featurette-divider">

         <div class="row featurette">
           <div class="col-md-7">
             <h2 class="featurette-heading"> Club de la cerveza<br><span class="text-muted"> Variedades destacadas </span></h2>
             <p class="lead"> Descubrí nuevas cervezas artesanales. Todos los meses un pack en promoción para que las puedas probar
           </div>
           <div class="col-md-5">
             <img class="featurette-image img-fluid mx-auto" src="{{asset('storage/index/beer3.jpg')}}"  alt="BeerShop3">
           </div>
         </div>

         <hr class="featurette-divider">

         <!-- /END THE FEATURETTES -->

        </main>
        
    </div>
@endsection
