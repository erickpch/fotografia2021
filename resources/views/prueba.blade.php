@extends ('helpers/navbar')

@section('titulo','Codigo' )

@section('contenido')


<style>
.center {
  margin-left: auto;
  margin-right: auto;
}
.centrado{
margin-left: auto;
  margin-right: auto; 
}
</style>

     
    

<br><br><br><br><br><br><br><br>


    <div class="container">
    <div ><h1>Codigo QR</h1></div>
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="reporte" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr >
                                <th class="centrado">Codigo</th>
                            </tr>
                        </thead>
                        
                        <tbody>                        
                            <tr>           
                            <td class="centrado"><img src="{{asset($imagen['codigo_qr'])}}" alt="codigo qr" height="500%"></td>                                                     
                            </tr>                       
                        </tbody>  
                       </table>                  
                    </div>
                </div>
        </div>  
        <button onclick="window.print()">Imprimir</button>
    </div>    
    