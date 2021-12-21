<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    
    use HasFactory;
    protected $table='negocio';
    protected $fillable=['id','nombre','imagen','nit','telefono','correo','direccion','mision','vision'];
 
}