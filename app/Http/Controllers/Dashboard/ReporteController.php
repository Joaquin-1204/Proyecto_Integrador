<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Category;
use App\Factura;
use Cart;
use Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveBook;
use App\User;
use Darryldecode\Cart\Cart as CartCart;
use Facade\FlareClient\Http\Response as HttpResponse;
use Illuminate\Http\Request;

class ReporteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function json(){            
        $user           =   User::all();
        $books       =   Book::all();
        $facturas       =   Factura::all();


        $json_string =  json_encode($user);
        $file = 'cliente.json';
        file_put_contents($file,$json_string);

        $json_string_books =  json_encode($books);
        $file = 'books.json';
        file_put_contents($file,$json_string_books);

        $json_string_facturas =  json_encode($facturas);
        $file = 'facturas.json';
        file_put_contents($file,$json_string_facturas);
        /*return Response::json(  
            array(
                    'user'      =>  $user,
                    'books'  =>  $books,
                    'facturas'=>$facturas,
            ),200);
            */
        //dd($books);
            
        }

}