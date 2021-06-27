<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Category;
use App\User;
use App\Compra;
use App\DetalleFactura;
use App\Factura;
use Cart;
use App\Http\Controllers\Controller;
//use App\Http\Requests\SaveCompra;
use App\Http\Requests\SaveFactura;
use Darryldecode\Cart\Cart as CartCart;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Collection;
use MongoDB\Collection as MongoDBCollection;

class CompraController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function confirmar(User $user, DetalleFactura $DetFact/*User $user*/){
              //return $user->all();




        //return auth()->user()->name;
        //auth()->user()->name;
        return view('dashboard.compra.confirmar',['cliente'=>auth()->user(),'libros'=>$DetFact]);
        
    }
    public function store()
    {
            $fac = new Factura;
            $fac->id = auth()->user()->id;
            $fac->name = auth()->user()->name;
            $fac->lastname = auth()->user()->lastname;
            $fac->email = auth()->user()->email;
            $fac->address = auth()->user()->address;
            $fac->phone = auth()->user()->phone;
            
            //dd(Cart::getContent()->all());
            //$col = collect();
            $array = [];
            foreach(Cart::getContent() as $item)
            {
                
                $book_id = $item->id;
                $book_name = $item->name;
                $book_price = $item->price;
                $book_quantity = $item->quantity;
                               
                    $array[] = ['Book_id'=>$book_id,'title'=>$book_name,'price'=>$book_price,'quantity'=>$book_quantity];
                    $fac->book =$array;
                    $fac->total = Cart::getTotal();
                $fac->save();
            }
            
            
            
            
            return back()->with('status', 'Compra Realizada Correctamente');
            
            
    }
}
