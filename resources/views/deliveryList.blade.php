@extends('layouts.app')

@section('title')
  Delivery List - BeerShop
@endsection

@section('content')
            <br><br>
           <div class="text-center">
              <form action="{{URL::to('/deliveryList')}}" method="post">
                  {{csrf_field()}}
                  <input class="contactInput" name="q" type="text" >
                  <input id="contactButton" type="submit" value="Buscar"/>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <input id="contactButton" type="submit" name="opcion" value="Sin Enviar">
                  <input id="contactButton" type="submit" name="opcion" value="Enviados">
              </form>

            <br>
            <h3> Pedidos -lista de envios</h3>
            <div class="ContactContainerForm table-responsive">
              <table class=" table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nro de Pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Ciudad</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Estado <br><p style="font-size:12px;"><em>presione para cambiar el estado</em></p></th>
                </thead>

                <tbody>
                @foreach ($orderHd as $order)
                    <tr>
                      <td> <a href="{{URL::to('/invoice/'. $order->order_id)}}"> {{$order->order_id}}</a></td>
                      <td>{{ date('d-m-Y', strtotime($order->created_at))}}</td>
                      <td class="text-capitalize">{{ $order->username}}</td>
                      <td class="text-capitalize">{{ $orderAdd->firstWhere('order_id', $order->order_id)->adr}}</td>
                      <td class="text-capitalize">{{ $orderAdd->firstWhere('order_id', $order->order_id)->city}}</td>
                      <td >{{ $orderAdd->firstWhere('order_id', $order->order_id)->phone}}</td>
                      
                      <td class="orange">
                      <form action="{{URL::to('/deliveryList')}}" method="post">
                          <input type="hidden" name="order_id" value={{$order->order_id}}>
                           @if ($order->delivered_ok ==0)   
                              <input class="btn btn-xs orange" type="submit" name="deliver" value="Sin entregar">
                           @else
                              <input class="btn btn-xs orange" type="submit" name="deliver" value="Entregado">
                           @endif
                           {{csrf_field()}}
                            </form>
                      </td>
                    </tr>
                @endforeach
               </tbody>
            </table>
            <div class="d-flex">
              <div class="mx-auto">
              </div>
            </div>
        </div>
        <div class="text-center"><br>
          <button class="btn btn-secondary" onclick="printPDF()">Guardar PDF</button>
        </div>
        <br>
<script src="js/printDeliveryList.js"> </script>                 
@endsection
