<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class Factura extends Model
{
    protected $primaryKey = '_id';

    protected $fillable = ['_id','client_id','name','lastname','email','address','phone','book','total'];

    protected $collection = 'compra_collections';

    
    public function cliente(){
        return $this->belongsTo(user::class);
    }

    public function book(){
        return $this->hasMany(book::class);
    }
}