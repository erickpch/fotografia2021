@extends ('helpers/navbar')

@section('titulo','Album' )

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
  max-width: 1640px;
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

.img2 {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 250px;
}



</style>


<br><br><br>
<div class="wrapper">
<div class="container2">
    <div class="card-header">
        <h1 class="card-title">{{$evento[0]['nombre']}}</h3>
    </div>
    <hr>

    @foreach ($fotos as $foto)
    
   
   
    <img class="img2"  src="{{ asset($foto['url'])}}" alt="" />
    </a>
    

    @endforeach
</div>
</div>

@endsection