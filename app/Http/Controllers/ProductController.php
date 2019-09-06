<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Brand;
use App\Category;
use App\Origin;
use App\Style;


class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('productList', compact('products'));
    }

    public function add()
    {
        $brands = Brand::All();
        $categories = Category::All();
        $origins = Origin::All();
        $s = Style::All();
        return view('addProduct', 
                        compact('brands','categories','origins','s'));
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|max:30|min:6',
            'size' => 'required|integer|min:1',
            'price' => 'required|between:0.10,10000.00',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],
        [
            'required' => 'El campo :attribute es requerido',
            'max' => 'El campo :attribute excede el máximo permitido',
            'min' => 'El campo :attribute no alcanza el mínimo permitido',
            'integer' => 'El campo :attribute debe ser un entero',
            'between' => 'El campo :attribute debe estar entre 0.10 y 10000.00',
            'image'=>'El campo :attribute no es una imagen válida'
          ]);

         $beer = new  Product();
         $beer->name= $request->name;
         $beer->price= $request->price;
         $beer->size= $request->size;
         $beer->id_brand= $request->brand;
         $beer->id_category= $request->category;
         $beer->id_style= $request->style;
         $beer->id_origin= $request->origin;
            $path=  $request->file('img')->store('public/images');
            $file_name= basename($path);
         $beer->image = $file_name;
         $beer->active = 1;
                
         $beer->save();
        
         $products = Product::orderBy('created_at', 'desc')->paginate(10);
         return view('productList', compact('products'));
        }


        public function search( request $request)
        {
            
            if (isset($request->q))
            { 
              /*para textos directos */
               $aux='%'. $request->q .'%';

              /*para marcas */ 
               $brands= Brand::where('name', 'like',$aux )->get();
               $brand_id = [];
                foreach ($brands as $brand){
                    $brand_id[]= $brand->id;
                };
              /*para origenes */ 
              $origins= Origin::where('country', 'like',$aux )->get();
              $origin_id = [];
               foreach ($origins as $origin){
                   $origin_id[]= $origin->id;
               };  

               /*para estilos */ 
              $styles= Style::where('name', 'like',$aux )->get();
              $style_id = [];
               foreach ($styles as $style){
                   $style_id[]= $style->id;
               };  

              /*para categorias */ 
              $categories= category::where('name', 'like',$aux )->get();
              $category_id = [];
               foreach ($categories as $category){
                   $category_id[]= $category->id;
               };  



               $products= Product::where('name', 'like',$aux )
                 ->orWhere('size', 'like', $aux)  
                 ->orWhere('price', 'like', $aux)
                 ->whereIn('id_brand', $brand_id, 'or')
                 ->whereIn('id_origin', $origin_id, 'or')
                 ->whereIn('id_style', $style_id, 'or')
                 ->whereIn('id_category', $category_id, 'or')
                 ->orderBy('id', 'desc')
                 ->paginate(10); 
             }
             else
             {
                $products = Product::paginate(10);
             };   
            return view('productList', compact('products'));
        }

        
    public function delete(Request $request)
    {
        $beer = Product::find($request->id);
        $beer->active=0; 
        $beer->save(); 

        $products = Product::paginate(10);
        return view('productList', compact('products'));
    }

    public function edit(Request $request)
    {
        $beer = Product::find($request->id);
        $brands = Brand::All();
        $categories = Category::All();
        $origins = Origin::All();
        $s = Style::All();
        return view('productEdit', compact('beer', 'brands','categories','origins','s'));
    }

    public function saveProductChange(Request $request)
    {
        $beer = Product::find($request->id);

        $request->validate([
            'name' => 'required|max:30|min:6',
            'size' => 'required|integer|min:1',
            'price' => 'required|between:0.10,10000.00',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ],
        [
            'required' => 'El campo :attribute es requerido',
            'max' => 'El campo :attribute excede el máximo permitido',
            'min' => 'El campo :attribute no alcanza el mínimo permitido',
            'integer' => 'El campo :attribute debe ser un entero',
            'between' => 'El campo :attribute debe estar entre 0.10 y 10000.00',
            'image'=>'El campo :attribute no es una imagen válida'
          ]);

          $beer->name= $request->name;
          $beer->price= $request->price;
          $beer->size= $request->size;
          $beer->id_brand= $request->brand;
          $beer->id_category= $request->category;
          $beer->id_style= $request->style;
          $beer->id_origin= $request->origin;

          if (isset($request->img)){
             $path=  $request->file('img')->store('public/images');
             $file_name= basename($path);
          $beer->image = $file_name;
          };
 
          $beer->save();
        
          $products = Product::paginate(10);
          return view('productList', compact('products'));
    }

    public function show(Request $request)
    {
        $beer = Product::find($request->id);
        $brand = Brand::find($beer->id_brand);
        $category= Category::find($beer->id_category);
        $origin = Origin::find($beer->id_origin);
        $s = Style::find($beer->id_style);
        return view('product', compact('beer', 'brand','category','origin','s'));
    }


}

