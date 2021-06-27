<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use Jenssegers\Mongodb\Eloquent\Model;

class DetalleFactura extends Model
{
    protected $primaryKey = '_id';

    protected $fillable = ['_id','libro_id','cantidad','precio'];

    protected $collection = 'detallefactura';

    public function libro(){
        return $this->belongsTo(libro::class);
    }
}
