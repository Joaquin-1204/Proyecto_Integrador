<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Category;
use Cart;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveBook;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request){
       
        $book = Book::find($request->book_id);
        Cart::add(
                $book->_id, 
                $book->title, 
                $book->precio,
                1               
            );

        
        return back();//->with('status', 'Libro agregado correctamente');
    }
    public function cart(){
    
        return view('checkout');
    }
    public function additem(Request $request){
        Cart::add([
            'id' => $request->id,
            ]);
    }
    public function deletemore(){
    
        return view('checkout');
    }
    public function removeitem(Request $request) {
        //$producto = Producto::where('id', $request->id)->firstOrFail();
        Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"Producto eliminado con éxito de su carrito.");
    }

    public function clear(){
        Cart::clear();
        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}