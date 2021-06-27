<?php

use App\Book;

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {


    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('dashboard/book', 'Dashboard\BookController');
Route::resource('dashboard/compra', 'Dashboard\CompraController');
Route::resource('dashboard/client', 'Dashboard\ClientController');
Route::get('/listalibros', 'Dashboard\BookController@index')->name('listalibros');
Route::get('/crearlibro', 'Dashboard\BookController@create');
Route::get('/listacategorias', 'Dashboard\CategoryController@index')->name('listacategorias');
Route::get('/crearcategoria', 'Dashboard\CategoryController@create');
Route::get('/listaclientes', 'Dashboard\ClientController@index')->name('listaclientes');
Route::post('/cart-add', 'Dashboard\CarritoController@add')->name('cart.add');
Route::get('/cart-checkout','Dashboard\CarritoController@cart')->name('cart.checkout');
Route::post('/cart-clear',  'Dashboard\CarritoController@clear')->name('cart.clear');
Route::post('/cart-removeitem',  'Dashboard\CarritoController@removeitem')->name('cart.removeitem');
Route::get('/cart-clear',  'Dashboard\CarritoController@clear')->name('cart.clear');
Route::post('/cart-addmore',  'Dashboard\CarritoController@additem')->name('cart.additem');
Route::post('/cart-deletemore',  'Dashboard\CarritoController@deletemore')->name('cart.deletemore');
Route::get('/confirmar','Dashboard\CompraController@confirmar')->name('carrito.confirmar');
Route::get('/compra',  'Dashboard\CompraController@store')->name('compra.store');
Route::get('/report',  'Dashboard\ReporteController@json')->name('report.generade');

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {
    Route::resource('book', 'BookController');
    Route::resource('category', 'CategoryController');
    Route::resource('compra', 'CompraController');
    
});
Route::get('/search/','HomeController@search');
/*
Route::get('/', function () {
    if( Auth::user() ) //se valida si esta logueado
        if( Auth::user()->rol =='admin' ) //se valida el tipo de usuario
            return redirect('/admin');
        else
            return redirect('/normal');
    else
        return redirect('/login');
});

*/