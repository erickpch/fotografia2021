<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoVenta extends Model
{
    protected $table='foto_venta';
    protected $fillable=['id','id_foto','id_venta'];
   
}