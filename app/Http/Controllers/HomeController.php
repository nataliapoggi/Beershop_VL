<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;
use App\Category;
use App\Origin;
use App\Style;
use App\Order   ;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('active', '=', 1)
            ->orderBy('created_at', 'desc')->paginate(9);
        $brands = Brand::All();
        $categories = Category::All();
        $origins = Origin::All();
        $s = Style::All();
        return view('home',
                compact('products', 'brands', 'categories', 'origins', 's'));
    }

    public function search(Request $request){
        $products = Product::where('name', 'like', '%'. $request->q.'%' )
            ->where('active', '=', 1)
            ->paginate(9);
        $brands = Brand::All();
        $categories = Category::All();
        $origins = Origin::All();
        $s = Style::All();
        return view('home',
                compact('products', 'brands', 'categories', 'origins', 's'));
    }

    public function indexFilter( request $request)
    {
        
        if($request->filter == 'price')
        {
                $price = $request->value;
                switch($price){
                    case 100: 
                        $products= Product::where('price', '<=',100 )
                        ->where('active', '=', 1)
                        ->orderBy('created_at', 'desc')->get()
                        ->paginate(9);
                        break;
                    case 200: 
                        $products= Product::where('price', '>=',100 )
                                ->where('price', '<=',200 )
                                ->where('active', '=', 1)
                                ->orderBy('created_at', 'desc')
                                ->paginate(9);
                                break;
                    case 500: 
                        $products= Product::where('price', '>=',200 )
                                ->where('price', '<=',500 )
                                ->where('active', '=', 1)
                                ->orderBy('created_at', 'desc')
                                ->paginate(9);
                                break;                
                    default: 
                        $products= Product::where('price', '>=',$price )
                        ->where('active', '=', 1)
                        ->orderBy('created_at', 'desc')
                        ->paginate(9);
                }
                
                $brands = Brand::All();
                $categories = Category::All();
                $origins = Origin::All();
                $s = Style::All();
                return view('home',
                        compact('products', 'brands', 'categories', 'origins', 's'));
            };
         if($request->filter== 'brand')
            {
                $brand = $request->value;
                $products= Product::where('id_brand', '=',$brand)
                    ->where('active', '=', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        
                $brands = Brand::All();
                $categories = Category::All();
                $origins = Origin::All();
                $s = Style::All();
                return view('home',
                    compact('products', 'brands', 'categories', 'origins', 's'));
            }
        if($request->filter== 'category')
            {
                $category = $request->value;
                $products= Product::where('id_category', '=',$category)
                    ->where('active', '=', 1)
                    ->orderBy('created_at', 'desc')
                    ->paginate(9);
        
                $brands = Brand::All();
                $categories = Category::All();
                $origins = Origin::All();
                $s = Style::All();
                return view('home',
                    compact('products', 'brands', 'categories', 'origins', 's'));
            }
        }
        
    public function shopProduct(request $request)
    {
       $request->validate([
            'cant' => 'required|integer|min:1',
            'prodId' => 'required',
       ],
       [
           'required' => 'El campo :attribute es requerido',
            'min' => 'El campo :attribute no alcanza el mínimo permitido',
            'integer' => 'El campo :attribute debe ser un entero',
       ]);

        $product = Product::find($request->prodId);
        $user_id = auth()->user()->id;

        $orderDetail = new order();
        $price= $product->price;
              
        $new_order_detail= new Order();
        $new_order_detail->user_id= $user_id;
        $new_order_detail->product_id= $product->id;
        $new_order_detail->cant= $request->cant;
        $new_order_detail->price= $product->price;
        $new_order_detail->paid= 0;

        $new_order_detail->save();

        $orderItems = Order::where('user_id','=', $user_id )
                                 ->where('paid', '=', 0)
                                 ->get();
        return view('cart', compact('orderItems'));
     }


     public function eliminateProduct(Request $request)
    {    
        $itemDelete = Order::find($request->id)->delete();
        $orderItems = Order::where('user_id','=', auth()->user()->id )
                        ->where('paid', '=', 0)
                        ->get();
        return view('cart', compact('orderItems'));
    }

    /* show the cart */
    public function showCart()
    {
        $orderItems = Order::where('user_id','=', auth()->user()->id )
                        ->where('paid', '=', 0)
                        ->get();
        return view('cart', compact('orderItems'));
    }
        
}
