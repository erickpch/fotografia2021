<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrador')->insert([
            
            [
                'id'=>'1',
                'email' => 'admin@mail.com',
                'password' => Hash::make('12345678'),
                ],
          
        ]);

        DB::table('negocio')->insert([
            
            [
                'id'=>'1',
                'nombre'=>'Photo Studio',
                'imagen'=>'/estudios/1.jpg',
                'nit'=>'134654',
                'telefono'=>'3668957',
                'correo'=>'studioo@gmail.com',
                'direccion'=>'calle las pavas N°12',
                'mision'=>'mejor calidad a buen precio',
                'vision'=>'darle al cliente la satisfaccion que merece'
                ],
                        [
                'id'=>'2',
                'nombre'=>'Magnoria',
                'imagen'=>'/estudios/2.jpg',
                'nit'=>'849002',
                'telefono'=>'3842099',
                'correo'=>'magnolia@gmail.com',
                'direccion'=>'Av las Liras',
                'mision'=>'presencia, perseverancia y buen angulo',
                'vision'=>'buen servicio de alta calidad'
                ],

                [
                'id'=>'3',
                'nombre'=>'Ana Olivia',
                'imagen'=>'/estudios/3.jpg',
                'nit'=>'700846',
                'telefono'=>'3706901',
                'correo'=>'olivia@gmail.com',
                'direccion'=>'calle los tordos radial 26',
                'mision'=>'el cliente siempre tiene la razon',
                'vision'=>'escuchar la sugerencia de los clientes para mejorar'
                ],
                
                     
              
          
        ]);

        
    }
}
