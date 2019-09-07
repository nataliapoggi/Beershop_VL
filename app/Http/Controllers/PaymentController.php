<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\orderHd;
use App\orderDt;
use App\orderAdd;
use App\orderPay;
use APP\user;

class PaymentController extends Controller
{
    //
    public function show()
    {
        $orderItems = Order::where('user_id','=',  auth()->user()->id )
                                 ->where('paid', '=', 0)
                                 ->get();
        $total= 0;
        foreach ($orderItems as $item){
            $total = $total + $item->cant * $item->price;
        }                         
        return view('pay', compact('total'));
    }

    public function process(Request $request)
    {
        //dd($request);

        /*valido la direccion  
        y TBD la forma de  pago*/

        
        $request->validate([
            'address' => 'required|string|min:10',
            'phone' => 'required|numeric|integer|between:10000000,9999999999999',
            'cardname' => 'required|string|min:4',
            'cardnumber' => 'required|numeric|between:1000000000000,999999999999999999',
            'expmonth' => 'required', //|regex:/(^([1-9]|1[012])/\[2]\d[0-1]\d$)',
            'cvv' => 'required|numeric|integer|between:0,9999'
        ],
        [
            'required' => 'El campo :attribute es requerido',
            'between' => 'El campo es incorrecto',
            'min' => 'El campo :attribute no alcanza el mínimo permitido',
            'numeric' => 'El campo debe contener solo numeros',
            'regex'=>'Formato inválido'
          ]);

     
        /* creo el nuevo order header */  

        if (!orderHd::max('order_id')) {
            $order_id =1;    
        }
        else{
            $order_id =1 + orderHd::max('order_id');    
        }

        $user_id = auth()->user()->id;

        
        $orderItems = Order::where('user_id','=',  $user_id)
                    ->where('paid', '=', 0)
                    ->get();
         $total=0;
        
         foreach($orderItems as $item){
             $total += ($item->cant*$item->price);
         }

         $newOrderHd = new orderHd();
         $newOrderHd->order_id= $order_id;
         $newOrderHd->user_id= $user_id;
         $newOrderHd->username= user::find($user_id)->fullName();
         $newOrderHd->total= $total;

         $newOrderHd->save();

         /* grabo el order detail y actualizo orders como pagada*/

         foreach($orderItems as $item){
            $newOrderDt =  new orderDt();
            $newOrderDt->order_id = $order_id;
            $newOrderDt->product_id = $item->product_id;
            $newOrderDt->cant = $item->cant;
            $newOrderDt->price = $item->price;
            
            $newOrderDt->save();
            $item->paid =1;
            $item->save();
        }

         /* grabo el order address*/

         $newOrderAdd = new orderAdd();
         $newOrderAdd->order_id= $order_id;
         $newOrderAdd->name= $request->name;
         $newOrderAdd->email= $request->email;
         $newOrderAdd->adr= $request->address;
         $newOrderAdd->city= $request->city;
         $newOrderAdd->phone= $request->phone;

         $newOrderAdd->save();

         /* grabo el order payment TBD*/
         $neworderPay = new orderPay();
         $neworderPay->order_id= $order_id;
         $neworderPay->cardname= $request->cardname;
         $neworderPay->ccnum= 1111111111111111;
         $neworderPay->expmonth= $request->expmonth;
         $neworderPay->cvv= $request->cvv;

         $neworderPay->save();

         // aca va el codifo para guardar el pago
         return view('paymentSuccess');
       
    }
    
}
