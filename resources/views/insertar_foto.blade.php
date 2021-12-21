@extends ('helpers/navbar')

@section('titulo','Fotos')

@section('contenido')

<style>

* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

body {
  font-family: 'Montserrat', sans-serif;
  background: #535c68;
}

.wrapper {
  margin: auto;
  max-width: 640px;
  padding-top: 60px;
  text-align: center;
}

.container2 {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 10px;
  /*border: 0.5px solid rgba(130, 130, 130, 0.25);*/
  /*box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1), 
              0 0 0 1px rgba(0, 0, 0, 0.1);*/
}



.upload-container {
  background-color: rgb(239, 239, 239);
  border-radius: 6px;
  padding: 10px;
}

.border-container2 {
  border: 5px dashed rgba(198, 198, 198, 0.65);
  border-radius: 6px;
  padding: 20px;
}

.border-container2 p {
  color: #130f40;
  font-weight: 600;
  font-size: 1.1em;
  letter-spacing: -1px;
  margin-top: 30px;
  margin-bottom: 0;
  opacity: 0.65;
}

#file-browser {
  text-decoration: none;
  color: rgb(22,42,255);
  border-bottom: 3px dotted rgba(22, 22, 255, 0.85);
}

#file-browser:hover {
  color: rgb(0, 0, 255);
  border-bottom: 3px dotted rgba(0, 0, 255, 0.85);
}

.icons {
  color: #95afc0;
  opacity: 0.55;
}
</style>
<br><br>
<div class="wrapper">
<div class="container2">
<div class="row">
        <div class="col-12">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Agregar Foto</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                  <div class="card-body">


                  @if(!empty($eventos[0])) 
                    <form action="{{ route('subirFoto')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <label class="label">Empresa</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="evento">  
                                                                    
                                    <option value="{{$eventos[0]['id']}}" selected> <b>fecha:{{$eventos[0]['fecha']}}</b> / nombre:{{$eventos[0]['nombre']}} </option>
                                    @foreach ($eventos as $evento)
                                    <option value="{{$evento['id']}}" ><b>fecha:{{$evento['fecha']}}</b> /nombre:{{$evento['nombre']}} </option>
                                    @endforeach
                                  
                                    
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            <br><br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Imagen:</strong>
                                    <div class="input-group">
                                        <input name="imagen" type="file" id="imagen" onchange="validarFile(this);">
                                      </div>
                                </div>
                            </div>
                       
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a class="btn btn-primary" href="{{ route('vistaMenu') }}">Atras</a>
                                </div>
                            </div>
                        </div>
                    </form>
                  @endif  
                  @if(empty($eventos[0])) 
                    <h4>No hay eventos disponibles </h4>
                  @endif  
                  </div>
                  <!-- /.card-body -->
              </div>
        </div>
        </div>
        </div>
        </div>

        <script>
        //Funcion de JS que valida el archivo ingresado al input. Formato y Tamaño.
        function validarFile(all) {
            //EXTENSIONES Y TAMANO PERMITIDO.
            var extensiones_permitidas = [".png", ".bmp", ".jpeg", ".jpg"];
            var tamano = 8; // EXPRESADO EN MB.
            var rutayarchivo = all.value;
            var ultimo_punto = all.value.lastIndexOf(".");
            var extension = rutayarchivo.slice(ultimo_punto, rutayarchivo.length);
            if (extensiones_permitidas.indexOf(extension) == -1) {
                alert("Extensión de archivo no valida");
                document.getElementById(all.id).value = "";
                return; // Si la extension es no válida ya no chequeo lo de abajo.
            }
            if ((all.files[0].size / 1048576) > tamano) {
                alert("El archivo no puede superar los " + tamano + "MB");
                document.getElementById(all.id).value = "";
                return;
            }
        }

    </script>

@endsection