<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Negocio;
use App\Foto;
use App\Evento;
class FotoController extends Controller
{
    public function subir_fotos(Request $request){

            $this->validate(request(),[
                'evento'=>'required'                
            ]);
    
            $datos=[
                'url'=>'',
                'id_evento'=>$request->evento,
            ];

            
            if ($request->has('imagen')) {
                $datos['url'] = 'storage/'.$request->imagen->store('fotos');
            }
            
            $evento=$request->evento;
            $producto=Foto::create($datos);
    
            return back()->withInput();
        
    }


    public function album($id){

        $album= Evento::where('id',$id)->count();
        
        if($album==0){            
            return redirect()->route('vistaMenu');
        }

        $evento=Evento::where('id',$id)->get();
        $fotos=Foto::where('id_evento',$id)->get();

        return view('album',compact('id','evento','fotos'));

    }

    public function foto2(){
        
        return view('foto');
    }
    
}
