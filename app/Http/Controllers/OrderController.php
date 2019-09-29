<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderHD;
use App\orderDt;
use App\orderPay;
use App\orderAdd;
use App\User;
use DB;

class orderController extends Controller
{
    //
    public function index()
    {
        $orders = orderHd::paginate();
        return view('orderList', compact('orders'));
    }

      /**
     * Display the specified orders.
     *
     */
     
    public function search(Request $request)
    {

      $user_name = auth()->user()->fullname();
      
      if (isset( $request->q))
     {
        $q =$request->q;
         
        
        $orders= orderHd::where( 'order_id', $q )
          ->orWhereDay('created_at', '=', date($q))
          ->orWhereMonth('created_at', '=', date($q))
          ->orWhereYear('created_at', '=', date($q))
          ->orWhere('total', 'like', '%'. $q .'%')
          ->orderBy('order_id')
          ->paginate(10); 
          return view('orderList', compact('orders'));
      };

      if (isset( $request['opcion']) && $request['opcion']=='Sin Pagar' )
      {
        $orders= orderHD::where('payment_ok', '=', 0)
              ->orderBy('id')
              ->paginate(10);
        return view('orderList', compact('orders'));
      };

      if (isset( $request['opcion']) && $request['opcion']!='Sin Enviar' )
      {
        $orders= orderHd::where('Sin Enviar', '=', 0)
              ->orderBy('id')
              ->paginate(10);
        return view('orderList', compact('orders'));
      };
    
      
      $orders = orderHd::orderBy('id')->paginate();
      return view('orderList', compact('orders'));
      
  }

  public function pay(Request $request)
  {
      $id = $request->id;
      
      $orderHd = orderhd::Where('order_id', '=', $id)->get();
      $orderPay = orderPay::Where('order_id', '=', $id)->get();
      $orderDt = orderDt::Where('order_id', '=', $id)->get();
      
      
      return view('processPayment', compact('orderHd', 'orderDt', 'orderPay'));
  }

  public function paymentFinish(Request $request)
  {
      $request->validate([
        'confirmation_numb' => 'required|min:1|integer',
        'order_id' => 'required',
       ],[
        'required' => 'El campo :attribute es requerido',
        'integer' => 'El campo :attribute debe ser un entero positivo',
        'min' => 'El campo :attribute debe ser mayor a 0',
      ]);

      $order_id = $request->order_id;
      $confirmation_numb = $request->confirmation_numb;

      db::beginTransaction();
      try {
      $orderPay = orderPay::Where('order_id', '=', $order_id)->first();
      $orderPay->confirmation_numb = $confirmation_numb;
      $orderPay->payment_confirmed = date("Y-m-d H:i:s"); 
      $orderPay->save();


      $orderHd = orderhd::Where('order_id', '=', $order_id)->first();
      $orderHd->payment_ok=1;
      $orderHd->save();

      db::commit();
      return view('paymentFinish');
     } catch (Exception $e) {
         db::rollbackTransaction();
         return view('paymentFailure');
     }
  }


  public function invoiceShow( $order_id)
  {
      
      $orderHd = orderhd::Where('order_id', '=', $order_id)->first();
      $orderDt = orderDt::Where('order_id', '=', $order_id)->get();
      $orderAdd = orderAdd::Where('order_id', '=', $order_id)->first();
    
      return view('/invoice', compact('orderHd','orderDt', 'orderAdd'));
   }

   public function deliveryIndex( )
  {
    $orderHd = orderhd::all();
    $orderAdd = orderAdd::all();
    
    return view('/deliveryList', compact('orderHd','orderAdd'));
   }

   public function deliverySearch( Request $request)
   {

    $orderAdd = orderAdd::all();

      if (isset( $request->q))
      {
          $q =$request->q;

          $orderHd= orderHd::where( 'order_id', $q )
            ->orWhereDay('created_at', '=', date($q))
            ->orWhereMonth('created_at', '=', date($q))
            ->orWhereYear('created_at', '=', date($q))
            ->orWhere('username', 'like', '%'. $q .'%')
            ->orderBy('order_id')
            ->get();
              
            return view('deliveryList', compact('orderHd', 'orderAdd'));
      };
        
      if (isset( $request['opcion']) && $request['opcion']=='Sin Enviar' )
      {
          $orderHd= orderHd::where('delivered_ok', '=', 0)
              ->orderBy('id')
              ->get();
            
          return view('deliveryList', compact('orderHd', 'orderAdd'));
      };
        
      if (isset( $request['opcion']) && $request['opcion']=='Enviados' )
      {
        $orderHd= orderHD::where('delivered_ok', '=', 1)
            ->orderBy('id')
            ->get();
            
        return view('deliveryList', compact('orderHd', 'orderAdd'));
      };
      
      if (isset( $request['deliver']) && $request['deliver']=='Sin entregar' )
      {

        $orderHd= orderHD::where('order_id', $request->order_id)->first();
        $orderHd->delivered_ok= 1;
        $orderHd->save();      
        $orderHd= orderHD::all();
        return view('deliveryList', compact('orderHd', 'orderAdd'));
      };

      if (isset( $request['deliver']) && $request['deliver']=='Entregado' )
      {

        $orderHd= orderHD::where('order_id', $request->order_id)->first();
        $orderHd->delivered_ok= 0;
        $orderHd->save();      
        $orderHd= orderHD::all();
        return view('deliveryList', compact('orderHd', 'orderAdd'));
      };

      $orderHd = orderHd::orderBy('id')->get();
      return view('deliveryList', compact('orderHd', 'orderAdd'));
    }

}