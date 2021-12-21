<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Usuario;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UsuarioController extends Controller
{
    public function singup(Request $request){

        $validator = Validator::make($request->all(),
        ['nombre'=>'required|string',
        'email'=>'required|string',
        //'sexo'=>'required|int',
        'edad'=>'required|string',
        /*'foto1'=>'required|string',
        'foto2'=>'required|string',
        'foto3'=>'required|string',*/
        'password'=>'required|string']);

        if ($validator->fails()) {
            return response()->json('Datos invalidos',500);
        }

        $existe= Usuario::where('email',$request->email)->first();
        if(!is_null($existe)){
            return response()->json('este email ya esta registrado',200);
        }

        
        $datos=[
            
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            //'sexo'=>$request->sexo,
            'edad'=>$request->edad,
            'foto1'=>'foto',  //$request->foto1,
            'foto2'=>'foto2',  //$request->foto2,
            'foto3'=>'foto3',   //$request->foto3,
            'password'=>Hash::make($request->password),            
        ];

        $usuario=Usuario::create($datos);    
        
        
        //-----inicia la api
        if (is_null($usuario)){  
            // return response()->json('Error al hacer la peticion de los datos',500);
        }

        //api
        $response=Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => '37d96d3e808048269ef89df6e4d0f1ca',
            'Content-Type' => 'application/json'
        ])->put('https://brazilsouth.api.cognitive.microsoft.com/face/v1.0/largefacelists/'.$usuario->id,
        [
            'name'=>'user'.$usuario->id
        ]);

       

        if ($response->status()==409){
            $response2=Http::withHeaders([
                'Ocp-Apim-Subscription-Key' => '37d96d3e808048269ef89df6e4d0f1ca',
                'Content-Type' => 'application/json'
            ])->delete('https://brazilsouth.api.cognitive.microsoft.com/face/v1.0/largefacelists/'.$usuario->id,
            [
            ]);
            if (!$response2->ok()){
                $usuario->delete();
                return response()->json("Error al eliminar el anterior id".$response2->status());
            }else{
                $response=Http::withHeaders([
                    'Ocp-Apim-Subscription-Key' => '37d96d3e808048269ef89df6e4d0f1ca',
                    'Content-Type' => 'application/json'
                ])->put('https://brazilsouth.api.cognitive.microsoft.com/face/v1.0/largefacelists/'.$usuario->id,
                [
                    'name'=>'user'.$usuario->id
                ]);
            }  
        }

        if (!$response->ok()){
            $usuario->delete();
            return response()->json("Error al crear el usuario".$response->status());
        }    
        

        return response()->json($usuario,200);    
        
    }

    public function login(Request $request){

        $credentials=$this->validate(request(),
        ['email'=>'email|required|string',
        'password'=>'required|string']);


        $usuario=Usuario::select('id','nombre','email','password','sexo','edad','foto1','foto2','foto3')->where('email',$request->email)->first();
        
        if (Auth::guard('usuario')->attempt($credentials)){ 
            return response()->json($usuario,200);
        }
            
        return response()->json('incorrecto',500);

    }

    public function fotoUsuario (Request $request,$number_photo){

        $usuario=User::find($request->id);
        if (is_null($usuario)){
            return response()->json('El usuario no existe',500);  
        }

        if (!$request->hasFile('image')){
            return response()->json('No existe la imagen',500);
        } 
        

        $image = $request->image->store('','public');

        $response=Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => '37d96d3e808048269ef89df6e4d0f1ca',
            'Content-Type' => 'application/json'
        ])->post('https://brazilsouth.api.cognitive.microsoft.com/face/v1.0/largefacelists/'.$request->id.'/persistedfaces',
        ['url'=>'http://191.232.172.106/'.asset('storage/'.$image)]);

        if (!$response->ok()){
            Storage::delete($image);
            if ($response->status()==400){
                return response()->json('La imagen contiene mas de una cara',400); 
            }
            return response()->json('Error del servidor microsoft azure',$response->status()); 
        } 

        $train=Http::withHeaders([
            'Ocp-Apim-Subscription-Key' => '37d96d3e808048269ef89df6e4d0f1ca',
            'Content-Type' => 'application/json'
        ])->post('https://brazilsouth.api.cognitive.microsoft.com/face/v1.0/largefacelists/'.$request->id.'/train',[

        ]);

        $user->update(['foto'.$number_photo=>$image]);

        return response()->json('public/storage/'.$image,$response->status());
    }

    public function prueba (Request $request){
        $datos=[            
            'nombre'=>$request->nombre,
            'email'=>$request->email,
            'sexo'=>$request->sexo,                      
        ];
 
        return response()->json($datos,200); 
    }
}
