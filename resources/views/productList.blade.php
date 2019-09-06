
@extends('layouts.app')

@section('title')
  Product List - BeerShop
@endsection

@section('content')
            <div class="text-center">
            <br>
              <form action="{{route('productListQ', 'q')}}" method="post">
              {{csrf_field()}}
                  <input class="contactInput" name="q" type="text" >
                  <input id="contactButton" type="submit" value="Buscar" />
              </form>
            <br>
            </div>
            <h3 class="text-center"> Productos <a href="{{URL::to('/addProduct')}}" class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a></h3>
            <div class="ContactContainerForm table-responsive">
                      <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Marca</th>
                                    <th>Nombre</th>
                                    <th>Categoria</th>
                                    <th>Ml</th>
                                    <th>Precio</th>
                                    <th>Estilo</th>
                                    <th>Origen</th>
                                    <th>Activo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>  
                                    <td>
                                        <div class="divImg50 text-center">
                                            <img class="rounded img50" src='{{asset("storage/images/$product->image")}}' alt="im">
                                        </div>
                                    </td>    
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{ $product->name}}</td>
                                    <td>{{ $product->category->name}}</td>
                                    <td>{{ $product->size}}</td>
                                    <td>{{ $product->price}}</td>
                                    <td>{{ $product->style->name}}</td>
                                    <td>{{ $product->origin->country}}</td>
                                    <td>{{ ($product->active ==1)? "SI":"NO"}}</td>
                                    <td>
                                        <a href="{{URL::to('/productEdit/'.  $product->id)}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                        <a href="{{URL::to('/productList/'.  $product->id)}}"  class="delete"  title="Delete" data-toggle="tooltip"> <i class="material-icons">&#xE872;</i></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center"> {{$products->links()}}</div>
                        
                        </div>
            </div>
            <div class="text-center"><br>
          <button class="btn btn-secondary" onclick="printPDF()">Guardar PDF</button>
        </div>
        <br>
        <script src="js/printProductList.js"> </script>
            
@endsection

