<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Category;
use Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveBook;
use App\Photo;
Use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users = User::orderBy('created_at')->paginate(8);
        return view('dashboard.client.index',['users' => $users]);
        #return view('/home',['books' => $books]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.book.create', 
        [
            'book' => new Book(),
            
            'categories'=> Category::pluck('_id','title')]);
    }
    public function postCrear(Book $request)
    {
        //$image = $request->file('imagen');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //public function store(SaveBook $request)
    public function store(SaveBook $request)
    {
        $category_id = $request->get('category_id');
        $imagen = $request->file('imagen');
        $ruta ='/img/';
        $nombre = sha1(Carbon::now()).".".$imagen->guessExtension(); 
        $imagen -> move(getcwd().$ruta,$nombre);
        $book = new Book;
        $book->title = $request->get('title');
        $book->age = $request->get('age');
        $book->cantidad = $request->get('cantidad');
        $book->precio = $request->get('precio');
        $book->description = $request->get('description');
        $book->category_id = $category_id;
        $book->imagen = $ruta.$nombre;
        //echo ($book);
        //echo $request;
        #Book::create($request->validated());
        #echo ($book);
        $book->save();
        
        return back()->with('status', 'Libro creado correctamente');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         //echo $book->imagen;
        return view('dashboard.client.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(SaveBook $request, Book $book)
    {
        

        $book->update($request->all());
        return back()->with('status', "Libro ". $book->title ." actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('status', "Libro eliminado correctamente");
    }
    /*public function search(Request $request){
        $search = $request->get('search');
        //$books = DB::table()
        $books = Book::search($search)->paginate(8);
        echo ("hola");
        //return view('dashboard.book.index',['books' => $books]);

    }*/
}
