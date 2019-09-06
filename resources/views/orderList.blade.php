@extends('layouts.app')

@section('title')
  Order List - BeerShop
@endsection

@section('content')
            <br><br>
           <div class="text-center">
              <form action="{{URL::to('/orderList')}}" method="post">
                  {{csrf_field()}}
                  <input class="contactInput" name="q" type="text" >
                  <input id="contactButton" type="submit" value="Buscar Pedido/Fecha"/>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <ion-icon name="star"></ion-icon>
                  <input id="contactButton" type="submit" name="opcion" value="Sin Pagar">
                  <input id="contactButton" type="submit" name="opcion" value="Sin Enviar">
              </form>

            <br>
            <h3> Mensajes recibidos</h3>
            <div class="ContactContainerForm table-responsive">
              <table class=" table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Nro de Pedido</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope="col">Pago OK</th>
                    <th scope="col">Enviado OK</th>
                </thead>

                <tbody>
                @foreach ($orders as $order)
                    <tr>
                      <td>{{$order->order_id}}</td>
                      <td>{{ date('d-m-Y', strtotime($order->created_at))}}</td>
                      <td>{{ $order->username}}</td>
                      <td>{{ $order->total}}</td>
                      <td>
                           @if ($order->payment_ok==0) 
                             <a href="{{URL::to('/processPayment/'. $order->order_id)}}">NO -- Procesa Pago</a>
                           @else
                             pagada
                           @endif
                      </td>
                      <td>
                           @if ($order->delivered_ok==0) 
                             <a href="{{URL::to('/processDelivery/'. $order->order_id)}}">NO -- Procesa Envio</a>
                           @else
                             Enviada
                           @endif
                      </td>
                    </tr>
                @endforeach
               </tbody>
            </table>
            <div class="d-flex">
              <div class="mx-auto">
                {{ $orders->links() }}
              </div>
            </div>
        </div>
        <div class="text-center"><br>
          <button class="btn btn-secondary" onclick="printPDF()">Guardar PDF</button>
        </div>
        <br>
        <script>
          function printPDF(){
            html2canvas(document.body,
            { 
              onrendered:function(canvas)
              {

                  //create image from web page
                  var img = canvas.toDataURL("image/png");
                  //create pdf object and add image to it, and then save
                  var doc = new jsPDF('p', "mm", "legal");
                  var width = doc.internal.pageSize.getWidth();
                  var hratio = canvas.height/canvas.width;
                  var height = width * hratio;
                  doc.size
                  doc.addImage(img,'JPEG',0,0, width, height);
                  doc.output('save', 'ususarios.pdf');

              }
              })};
      </script> 
        
@endsection
