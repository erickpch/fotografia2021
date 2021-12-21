<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table='evento';
    protected $fillable=['id','nombre','cliente','correo', 'ci','id_negocio','fecha','localizacion','descripcion','codigo_qr','hora'];

}