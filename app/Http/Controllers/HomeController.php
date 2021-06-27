<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        #return view('home');
        #$rpta = http::get('http://localhost:5000/libros');
        #$books = $rpta->json();
        //dd($books);
        $books = Book::orderBy('created_at','desc')->paginate(8);
        return view('home',['books' => $books]);
        #return view('home', compact('books'));//['books' => $books]);
    }
    public function search(Request $request){

        $search = $request->get('search');
        #$rpta = http::get('http://localhost:5000/libros/'.$search);
        #$books = $rpta->json();
        $books = Book::where('title', 'LIKE', "%{$search}%")->Paginate(8);

        return view("home",['books' => $books]);        
        //return view('home', compact('books'));
    }
}

/*
                        <div class="card-body">
                                <img src="{{ asset( $b->imagen)}}" class="card-img-top" style="width: 150px; height: 200px; border: 1px solid skyblue">
                                <h5 class='glyphicon glyphicon-phone'>Titulo: {{ $b->title }}</h5>
                                <h5 class="card-title text-center">Stock: {{ $b->cantidad }}</h5>
                                <h5 class="card-title text-center">Año: {{ $b->age }}</h5>
                                <h5 class="card-title text-center">Price: ${{ $b->precio }}</h5>
                                
                                <!--<h5 class="card-title text-center">Imagen: {{ $b->imagen }}</h5>-->

                                <!--<img src="images/logo.jpg">--> 
                                
                                @csrf
                                <form action="{{route('cart.add')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="book_id" value="{{$b->_id}}">
                                    <!--<input type="submit" name="btn"  class="btn btn-success">-->
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart text-white"></i></button>
                                    
                                </form>
                            </div>
                            */