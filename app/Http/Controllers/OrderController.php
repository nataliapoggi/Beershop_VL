<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderHD;
use App\orderDt;
use App\orderPay;
use App\orderAdd;
use App\User;


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
      
        $orders= orderHd::where('order_id', 'like', '%'. $q .'%')
          ->orWhere('created_at', 'like', '%'. $q .'%')
          ->orWhere('total', 'like', '%'. $q .'%')
          ->orderBy('id')
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

};