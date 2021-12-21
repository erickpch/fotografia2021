<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsuarioFoto extends Model
{
    protected $table='usuario_foto';
    protected $fillable=['id','id_usuario','id_foto'];
 
}