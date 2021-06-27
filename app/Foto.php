<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Foto extends Model
{
    protected $primaryKey = '_id';

    protected $fillable = ['_id','ruta'];

    protected $collection = 'photo_collection';

    
}
