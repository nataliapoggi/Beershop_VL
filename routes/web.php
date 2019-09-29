<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (){
    if ( (isset(Auth::user()->name)
             && (Auth::user()->is_admin == 0)))
    {
        return redirect()->route('homeShop');
    }
    else {
        return view('welcome');
    };
});


Auth::routes();

/*rutas del carrito/eshop */

Route::get('/home', 'HomeController@index')->name('homeShop');
Route::get('/home/{q}', 'HomeController@search')->name('homeSearch');
Route::get('/home/{filter?}/{value?}', 'HomeController@indexFilter')->name('homeShopFilter');
Route::get('/product/{id}', 'productController@show')->name('product');

//Route::post('/home/{cant?}/{prod_id}', 'HomeController@shopProduct')->name('shopProduct');
Route::post('/home', 'HomeController@shopProduct')->name('shopProduct');

Route::get('/cart/{id}', 'HomeController@eliminateProduct')->name('eliminateProduct');
Route::get('/cart', 'HomeController@showCart')->name('showcart');


/*rutas para el pago */
Route::get('/pay', 'PaymentController@show')->name('pay');
Route::post('/pay', 'PaymentController@process')->name('paymentDone');
Route::get('/paymentSuccess', function(){
            return view('paynmentSuccess');
            })->name('paynmentSuccess');
Route::get('/paymentFailure', function(){
                return view('paynmentFailure');
                })->name('paynmentFailure');
    


/* ruta faq*/
Route::get('/faq', function() {
    return view('faq');
})->name('faq');


/* ruta del adminMenu*/
Route::get('/adminMenu', function(){
    return view('adminMenu');
})->name('adminMenu');


/* contact routes */
Route::get('/contact', 'ContactController@create')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact');

Route::get('/contactSuccess', function(){
    return view('contactSuccess');
})->name('contactSuccess');

Route::get('/commentList', 'ContactController@index')->name('commentList');
Route::get('/commentList/{id}', 'ContactController@answer')->name('commentListID');
Route::post('/commentList', 'ContactController@search')->name('commentList');

/* users routes */ 
Route::get('/userList', 'UserController@index')->name('userList');
Route::post('/userList', 'UserController@search')->name('userList');

/* product routes */ 
Route::get('/productList', 'ProductController@index')->name('productList');
Route::post('/productList/{q}', 'ProductController@search')->name('productListQ');
Route::get('/productList/{id}', 'ProductController@delete')->name('productListDelete');
Route::get('/productEdit/{id}', 'ProductController@edit')->name('productEdit');
Route::post('/productEdit/{id}', 'ProductController@saveProductChange')->name('productChange');

Route::get('/addProduct', 'ProductController@add')->name('addProduct');
Route::post('/addProduct', 'ProductController@store')->name('addProduct');

/* orders routes */
Route::get('/orderList', 'OrderController@index')->name('orderList');
//Route::get('/orderList/{id}', 'OrderController@answer')->name('orderListID');
Route::post('/orderList', 'OrderController@search')->name('orderList');

Route::get('/processDelivery/{id}', 'OrderController@deliver');
Route::get('/processPayment/{id}', 'OrderController@pay');
Route::post('/paymentFinish', 'OrderController@paymentFinish');

Route::get('/invoice/{order_id}', 'OrderController@invoiceShow');

Route::get('/deliveryList', 'OrderController@deliveryIndex')->name('deliveryList');
Route::post('/deliveryList', 'OrderController@deliverySearch')->name('deliverySearch');

    