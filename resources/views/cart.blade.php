@extends('layouts.app')

@section('title')
  Cart - Beersop
@endsection

@section('content')
<div class="container">

    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-shop">
      <h4 id="prod">Productos </h4>
          <form class="form-inline my-2 my-lg-0" action="{{route('homeShop')}}" method="get">
              <div class="input-group-btn">
                <input class="btn btn-warning my-2 mx-2 my-sm-0 orange-button"  type="submit" value="Seguir comprando"/>
              </div>
          </form>      
          <form class="form-inline my-2 my-lg-0" action="{{route('pay')}}" method="get">
              <div class="input-group-btn">
                <input class="btn btn-warning my-2 mx-2 my-sm-0 orange-button" type="submit" value="Pagar"/>
                </div>
          </form>      
    </nav>
        
    <div class="row">

      <div class="col-lg-12">
      <div >
              <table class=" table  table-responsive-sm">
                <thead>
                  <tr>
                  <th scope="col"></th>
                    <th scope="col"><i>Producto</i></th>
                    <th scope="col" class="text-right"><i>Cantidad</i></th>
                    <th scope="col" class="text-right"><i>Precio Unitario</i></th>
                    <th scope="col" class="text-right"><i>Total</i></th>
                    <th scope="col"></th>
                    
                </thead>
                <tbody>
                  <?php use App\Product; ?>
                  @foreach ($orderItems as $item)
                    <tr>
                    <td>
                        <div class="divImg50 text-center">
                            <?php  $auxImage = Product::find($item->product_id)->image; ?>
                            <img class="rounded img50" src= '{{asset("storage/images/$auxImage")}}' alt="img">
                        </div>
                      </td>
                      <td><?= Product::find($item->product_id)->name;?></td>
                      <td class="text-right">{{$item->cant}}</td>
                      <td class="text-right"><?= Product::find($item->product_id)->price?></td>
                      <td class="text-right"> <?= $item->cant *Product::find($item->product_id)->price ?></td>
                          <!--va a cart y borra-->
                      <td>    
                          <a href="{{route('eliminateProduct', $item->id)}}"  style="font-size:20px;" data-toggle="tooltip">  <ion-icon name="trash"></ion-icon></a>
                      </td>
                    </tr>
                  @endforeach
               </tbody>
            </table>
        </div>

      </div>     
      <!-- /.col-lg-10 -->

    </div>
    <!-- /.row -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-shop">
      <h4> 
        <?php 
          $tot = 0;
          foreach ($orderItems as $item){
            $tot= $tot + $item->cant * Product::find($item->product_id)->price;
          }
        ?>
        <strong>Total : $<?= $tot ?></strong>
      </h4>
                
    </nav>

  </div>
  <!-- /.container -->
@endsection