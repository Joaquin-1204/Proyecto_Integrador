<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = '_id';

    protected $fillable = ['_id','title','description','age','precio','cantidad','imagen','category_id'];

    protected $collection = 'books_collection';

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
