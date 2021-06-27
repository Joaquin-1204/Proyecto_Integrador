<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Category;
use App\Foto;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCrear(Foto $request)
    {
        #echo $request;
        
        $imagen = $request->file('imagen');
        $ruta ='img/';
        $nombre = sha1(Carbon::now()).".".$imagen->guessExtension(); 
        $imagen -> move(getcwd().$ruta,$nombre);
        $foto = new Foto; 

        $foto->imagen = $ruta.$nombre;
        echo $foto->imagen;
        #$foto->imagen  = $ruta;
        
        
        Book::create($request->validated());
        //$foto->save();
        return back()->with('status', 'Libro creado correctamente');

    }

}
