@extends('layouts.app')

@section('title')
  Product detail - Beersop
@endsection

@section('content')
<br>
          <h3 class="text-center">Detalle del Producto</h3>
          <p class="text-center" >
            <img class="img120" src='{{asset("storage/images/$beer->image")}}' alt="img-prod">
          </p>
          <div class="ContactContainerForm">


              <table class=" table table-striped table-responsive-sm">
                <tbody>
                  <tr>
                      <td><label><strong><strong>Nombre: </strong> {{ $beer->name}} </label></td>
                      <td><label><strong>Tamaño: </strong> {{ $beer->size}} ml </label></td>
                  </tr>
                  <tr>
                      <td><label><strong>Precio: </strong> {{ $beer->price}}</label></td>
                      <td><label><strong>Marca: </strong> {{ $brand->name}} </label></td>
                  </tr>
                  <tr>    
                      <td><label><strong>Categoría:</strong> {{ $category->name}}</label></td>
                      <td><label><strong>Estilo: </strong>  {{ $s->name}}</label></td>
                  </tr>
                  <tr>
                      <td colspan="3"><label><strong>Origen: </strong> {{ $origin->country}}</label></td>
                  </tr>
                <tbody>
                </table >
              <br>
            </div>

@endsection
