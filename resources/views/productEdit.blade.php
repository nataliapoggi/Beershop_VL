@extends('layouts.app')

@section('title')
  Modify Product - BeerShop
@endsection

@section('content')
          <h3 class="text-center">Modificar Ítem</h3>
          <p class="text-center" >
            <img class="img120" src='{{asset("storage/images/$beer->image")}}' alt="img-prod">
          </p>
          <div class="ContactContainerForm table-responsive-sm text-center">
            <form enctype="multipart/form-data" action="{{URL::to('/productEdit/'.  $beer->id)}}" method="post" id="prodForm">
            {{csrf_field()}}  
              <table class=" table table-striped ">
                <tbody>
                  <tr>
                    <td colspan="3">
                        <input class="contactInput"   type="hidden" name="id" value="{{$beer->id}}">
                    </td>
                  </tr>
                  <tr>
                    <td><label for="name"><strong>Nombre: </strong> </label>
                        <input class="contactInput @error('name') is-invalid @enderror"   type="text" name="name" onblur="validate('name')" value="{{$beer->name}}">
                        @error('name')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorName"><ion-icon name="alert"></ion-icon>El nombre debe entre 6 y 30 caracteres</p>
                    </td>
                    <td><label for="size"><strong>Tamaño: </strong> </label>
                        <input class="contactInput @error('size') is-invalid @enderror"   type="text" name="size" onblur="validate('size')" value="{{$beer->size}}">
                        @error('size')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorSize"><ion-icon name="alert"></ion-icon>Debe ser un entero mayor a 1</p>
                    </td>
                   </tr>
                   <tr> 
                        <td><label for="price"><strong>Precio: </strong> </label>
                            <input class="contactInput @error('price') is-invalid @enderror"   type="text" name="price" onblur="validate('price')" value="{{$beer->size}}">
                            @error('price')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                            @enderror
                            <p class="js-error" id="errorPrice"><ion-icon name="alert"></ion-icon>Debe ser un entero mayor a 1</p>
                        </td>
                        <td><label for="brand"><strong>Marca: </strong></label>
                            <select name="brand" class="contactInputWidth" >
                                @foreach ($brands as $brand): ?>
                                <option value="{{$brand->id}}"
                                    @if ($beer->id_brand == $brand->id)
                                        {{"selected"}}
                                    @endif    
                                
                                >
                                        {{$brand->name}}
                                </option>
                                @endforeach
                            </select>
                  </tr>
                  <tr>
                        <td><label for="category"><strong> Categoria: </strong></label>
                            <select name="category"  class="contactInputWidth">
                                 @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    @if ($beer->id_category == $category->id)
                                        {{"selected"}}
                                    @endif    
                                >
                                         {{$category->name}}
                                </option>
                                 @endforeach
                            </select>
                        </td>
                        <td><label for="style"><strong>Estilo: </strong></label>
                            <select name="style" class="contactInputWidth">
                                @foreach ($s as $style)
                                  <option value="{{$style->id}}" 
                                    @if ($beer->id_style == $style->id)
                                        {{"selected"}}
                                    @endif    
                                  >
                                        {{$style->name}}
                                  </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                  <tr>
                    <td>
                       <label for="origin"><strong>Origen: </strong></label>
                        <select name="origin" class="contactInputWidth">
                              @foreach ($origins as $origin)
                                <option value="{{$origin->id}}"
                                    @if ($beer->id_origin == $origin->id)
                                        {{"selected"}}
                                    @endif    
                                        >    
                                        {{$origin->country}}
                                </option>
                              @endforeach
                        </select>
                    </td>
                    <td>
                    <label for="img">Imagen </label> 
                    
                    <input data-preview="#preview" name="img" onblur="validate('img')" type="file" id="imageInput">
                    <img class="col-sm-6" id="preview"  src="">
                     <p class="help-block">(jpg jpeg, png, bmp, gif, svg, or webp)</p>
                          @error('img')
                            <div class="invalid-feedback  d-block">{{ $message}}</div>
                          @enderror
                          <p class="js-error" id="errorSize"><ion-icon name="alert"></ion-icon>Debe cargar una imagen</p>
                   </td> 
                  </tr>
                  <td colspan="3" class="text-center"><input class="text-center" id ="contactButton" type="submit" value="Modificar"><br></td>
                <tbody>
                </table >

              </form>
              <br>
          </div>
  <script src="../js/productFormValidation.js"> </script>                   
@endsection
  
