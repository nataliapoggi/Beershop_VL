@extends('layouts.app')

@section('title')
  Add Product - BeerShop
@endsection
@section('content')
          <br>
          <h3 class="text-center"> Agregar Item</h3>
          <div class="ContactContainerForm">
            <div class="contactForm">
              <form enctype="multipart/form-data" action="{{ route('addProduct') }}" method="post" id="prodForm">
              <table class=" table table-striped table-responsive-sm">
              {{csrf_field()}}  
                <tbody>
                  <tr>
                      <td><label for="name">Nombre </label> </td>
                      <td> <input class="contactInputWidth @error('name') is-invalid @enderror"  type="text" name="name"  onblur="validate('name')" placeholder="Descripción" value="{{ old('name') }}" >
                          @error('name')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorName">El nombre debe entre 6 y 30 caracteres</p>
                      </td>
                      <td><label for="size">Ml (tamaño) </label> </td>
                      <td> <input class="contactInputWidth @error('size') is-invalid @enderror"   type="text" name="size" onblur="validate('size')" placeholder="  Ml" value="{{ old('size') }}" >
                          @error('size')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorSize">Debe ser un entero mayor a 1</p>
                      </td>
                  </tr>
                  <tr>
                      <td><label for="price">Precio </label> </td>
                      <td> <input class="contactInputWidth @error('price') is-invalid @enderror"   type="text" name="price" onblur="validate('price')" placeholder="  precio" value="{{ old('price') }}" >
                          @error('price')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorPrice">Debe ser un entero mayor a 1</p>
                     </td>
                      <td><label for="brand">Marca </label> </td>
                      <td>
                          <select name="brand" class="contactInputWidth">    
                              @foreach ($brands as $brand)
                                <option value="{{$brand->id}}" {{$brand->id==old("brand")?"selected": ""}}> {{$brand->name}}</option>
                              @endforeach
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <td><label for="category">Categoria </label> </td>
                      <td>
                          <select name="category" class="contactInputWidth">
                              @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$category->id==old("category")?"selected": ""}}> {{$category->name}}</option>
                              @endforeach
                          </select>
                      </td>
                      <td><label for="style">Estilo </label> </td>
                      <td>
                          <select name="style" class="contactInputWidth">
                              @foreach ($s as $style)
                                <option value="{{$style->id}}" {{$style->id==old("style")?"selected": ""}}> {{$style->name}}</option>
                              @endforeach
                          </select>
                      </td>
                  </tr>
                  <tr>
                    <td><label for="origin">Origen </label> </td>
                    <td>
                          <select name="origin" class="contactInputWidth">
                              @foreach ($origins as $origin) 
                                <option value="{{$origin->id}}" {{$origin->id==old("origin")?"selected": ""}}> {{$origin->country}}</option>
                              @endforeach
                          </select>
                      </td>    
                    <td><label for="img">Imagen </label> </td>
                    <td>
                    <input data-preview="#preview" name="img"  onblur="validate('img')" type="file" id="imageInput">
                    <img class="col-sm-6" id="preview"  src="">
                     <p class="help-block">(jpg jpeg, png, bmp, gif, svg, or webp)</p>
                          @error('img')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorSize">Debe cargar una imagen</p>
                   </td> 
                  </tr>
                </table>
               <div class="text-center" > 
                <input id ="contactButton" type="submit" value="Agregar"><br>
               </div> 
              </form>
              <br>
            </div>
          </div>
<script src="js/productFormValidation.js"> </script>               
@endsection