
@extends('layouts.app')

@section('title')
  Comment List - BeerShop
@endsection

@section('content')
            <br><br>
           <div class="text-center">
              <form action="{{URL::to('/commentList')}}" method="post">
                  {{csrf_field()}}
                  <input class="contactInput" name="q" type="text" >
                  <input id="contactButton" type="submit" value="Buscar"/>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <input id="contactButton" type="submit" name="opcion" value="Sin responder">
                  <input id="contactButton" type="submit" name="opcion" value="Respondidos">
              </form>

            <br>
            <h3> Mensajes recibidos</h3>
            <div class="ContactContainerForm table-responsive">
              <table class=" table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">email</th>
                    <th scope="col">Comentario</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Responder</th>
                </thead>

                <tbody>
                @foreach ($contacts as $comment)
                    <tr>
                      <td>{{$comment->id}}</td>
                      <td>{{ $comment->name}}</td>
                      <td>{{ $comment->lname}}</td>
                      <td>{{ $comment->email}}</td>
                      <td>{{ $comment->comment}}</td>
                      <td>{{ date('d-m-Y', strtotime($comment->created_at))}}</td>
                      <td>
                           @if ($comment->answered==0) 
                             <a href="{{URL::to('/commentList/'. $comment['id'])}}">Responder</a>
                           @else
                             Hecho
                           @endif
                      </td>
                    </tr>
                @endforeach
               </tbody>
            </table>
            <div class="d-flex">
              <div class="mx-auto">
                {{ $contacts->links() }}
              </div>
            </div>
        </div>
        <div class="text-center"><br>
          <button class="btn btn-secondary" onclick="printPDF()">Guardar PDF</button>
        </div>
        <br>
        <script src="js/printCommentList.js"></script> 
        
@endsection
