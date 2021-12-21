<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;

use App\Negocio;
use App\Evento;

class MenuAdministradorController extends Controller
{
   /* public function __construct(){
        $this->middleware('administrador');
    }
*/

    public function vistaMenu(){

        $albumes= Evento::get();
       
        return view('menu',compact('albumes'));
    }

    public function insertar(){

        $eventos= Evento::select('nombre','id','fecha')->orderBy('fecha', 'asc')->get();

        return view('insertar_foto',compact('eventos'));
    }

    public function crear(){

        $empresas= Negocio::select('nombre','id')->get();
        
        return view('crear_evento',compact('empresas'));
    }


    public function crear_evento(Request $request){

        

        $validator = Validator::make($request->all(), [
            'nombre'=>'required',
            'localizacion' => 'required',
            'hora' => 'required',
            'fecha' => 'required',
            'cliente'=> 'required',
            'ci' => 'int|required',
            'email' => 'required|email',
            'empresa' => 'required',
            'descripcion' => 'required'
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator, 'crear_evento');
        }
        ['id','nombre','cliente','correo', 'ci','fecha','localizacion','descripcion','codigo_qr','hora'];
        $nuevo=[
        'nombre'=>$request->nombre,
        'cliente'=>$request->cliente,
        'correo'=>$request->email,
        'ci'=>$request->ci,
        'id_negocio'=>$request->empresa,
        'fecha'=>$request->fecha,
        'localizacion'=>$request->localizacion,
        'descripcion'=>$request->descripcion,
        'codigo_qr'=>$request->nombre,
        'codigo_qr'=>'',
        'hora'=>$request->hora
        ];
        
        Evento::create($nuevo);

        $nro=Evento::select('id')->orderBy('id', 'desc')->get();
        $nro=$nro[0]['id'];

        

        Evento::find($nro)->update(['codigo_qr'=>'storage/qr/'.$nro.'.svg']);

        
        $qr_code=QrCode::format('svg')->generate($nro);
        


        $imagen=Evento::select('codigo_qr')->where('id',$nro)->first();

     
        return view('prueba',compact('qr_code','imagen'));
    }
}
