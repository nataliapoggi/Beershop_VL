@extends('layouts.app')

@section('content')
<div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                   {{ session('status') }}
                </div>
            @endif
</div>

<div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light nav-shop my-1">
            <h4 id="prod"> Productos</h4>
                <form class="form-inline my-2" action="{{route('homeSearch', 'q')}}" method="get">
                {{csrf_field()}}      
                    <input class="form-control mr-sm-2" type="search"  name="q" aria-label="Search">
                    <div class="input-group-btn">
                        <button class="btn" type="submit"><ion-icon name="search"></ion-icon></button>
                    </div>
                </form>
            </nav>
            

<div class="row">

  <div class="col-lg-3">
    <?php
        use App\Order;
        $quantity = Order::where('user_id','=', auth()->user()->id )
            ->where('paid', '=', 0)
            ->count();
    ?>
    <a  class="orange" href="{{route('showcart')}}" style="font-size:40px;" >
        <ion-icon name="cart"></ion-icon><span class="badge"><?= $quantity; ?> </span>
    </a>
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="fa fa-bars orange">&nbspfiltros</span>
      </button>  
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
    <div>
        <h5 class="my-1"> Precio</h5>
        <div class="list-group">
          <a href="{{route('homeShopFilter', ['price','100'])}}" class="list-group-item">menor 100</a>
          <a href="{{route('homeShopFilter', ['price','200'])}}" class="list-group-item">entre 100 y 200</a>
          <a href="{{route('homeShopFilter', ['price','500'])}}" class="list-group-item">entre 200 y 500</a>
          <a href="{{route('homeShopFilter', ['price','501'])}}" class="list-group-item">mayor a 500</a>
        </div>
        
        <h5 class="my-1"> Marca</h5>
        <div class="list-group">
          @foreach ($brands as $brand)
            <a href="{{route('homeShopFilter', ['brand',  $brand->id])}}" class="list-group-item">{{$brand->name}} </a>
          @endforeach 
        </div>
        
        <h5 class="my-1"> Categoria</h5>
        <div class="list-group">
          
          @foreach ($categories as $category)
          <a href="{{route('homeShopFilter', ['category',  $category->id])}}" class="list-group-item">{{$category->name}}</a>
          @endforeach 
        </div>
      </div>
  
    </div>
    </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    
    <div class="row">
    @foreach ($products as $product)
      <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
          <a href="{{route('product', $product->id)}}"><img class="card-img-top img180" src='{{asset("storage/images/$product->image")}}' alt="img"></a>
          <?php $id=$product->id; ?>
          <div class="card-body ">
            <h5 class="card-title text-center">
              <a href="{{route('product', $product->id)}}">{{ $product->name}}</a>
            </h5>
            <p class="card-text">Tamaño: {{ $product->size}} ml </p>
            <p class="card-text"> Precio: $ {{ $product->price}}  </p>
          </div>
          <div class="card-footer">
            <!--small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small-->
            <form class="form-inline my-2" action="{{route('shopProduct')}}" id="{{$product->id}}" method="post" onsubmit="validate(<?=$id?>)">
              <!-- la forma MAL de llegar al post pero me la guardo y la ruta tb xsi en el futuro lo necesito -->
              <!--form class="form-inline my-2" action="{{route('shopProduct', ['cant', $product->id])}}"  method="post"-->
            {{csrf_field()}}      
                <input name="prodId" type="hidden" value="{{$product->id}}">
                <input class="form-control mr-sm-2 col-6" type="add"  name="cant" >
                <p class="js-error"  id=<?="error".$id?>><ion-icon name="alert"></ion-icon> Debe ingresar un entero mayor a 0</p>
                <div class="input-group-btn">
                  <button class="btn" type="submit"><ion-icon name="add"></ion-icon>Agregar</button>
                </div>
                <!--input class="btn btn-outline-warning my-2 my-sm-0" type="submit" value="Buscar"/-->
            </form>
                <!--a href="#" class="btn btn-success">Agregar</a-->
              
          </div>
        </div>
      </div>

      @endforeach


    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

</div>
 <div class="pagination justify-content-center"> {{$products->links()}}</div>     
 <script src="js/homeFormValidation.js"></script>
@endsection
