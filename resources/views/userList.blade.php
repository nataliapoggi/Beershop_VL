@extends('layouts.app')

@section('title')
  User List - BeerShop
@endsection

@section('content')
 
<div class="text-center">
              <form action="{{URL::to('/userList')}}" method="post">
              {{csrf_field()}} <br>
                  <input class="contactInput" name="q" type="text" >
                  <input id="contactButton" type="submit" value="Buscar" />
            </form>
            <br>
            <h3> Usuarios</h3>
            <div class="ContactContainerForm">
              <table class=" table table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Usuario desde</th>
                    <th scope="col">Admin</th>
                </thead>

                <tbody>
                  @foreach ($users as $user)
                    <tr>
                      <td>{{ $user->id  }}</td>
                      <td>{{ $user->name}}</td>
                      <td>{{ $user->lname}}</td>
                      <td>{{ $user->email}}</td>
                      <td>{{ $user->bdate}}</td> 
                      <td>{{ date('d-m-Y', strtotime( $user->created_at))}}</td>
                      <td><?= ($user['is_admin']==1)? 'si':'no'; ?> </td>
                    </tr>
                  @endforeach
               </tbody>
            </table>   
            <div class="d-flex">
              <div class="mx-auto">
                {{$users->links()}}
              </div>
            </div>        
        </div>
        <div class="text-center"><br>
          <button class="btn btn-secondary" onclick="printPDF()">Guardar PDF</button>
        </div>
        <br>
        <script src="js/printUserList.js"></script> 
@endsection