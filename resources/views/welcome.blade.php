<!DOCTYPE html>
<html>
<title>HomePage</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<style>
body, html {
  height: 100%;
  font-family: "Inconsolata", sans-serif;
}

.bgimg {
  background-position: center;
  background-size: cover;
  background-image: url("https://cdn.domestika.org/c_fill,dpr_auto,f_auto,h_630,q_auto,w_1200/v1561557395/blog-post-open-graph-covers/000/002/093/2093-original.png?1561557395");
  min-height: 75%;
}

.menu {
  display: none;
}

.column {
  float: left;
  width: 25%;
  border: 3px outset black;
  background-color: lightblue;
  text-align: center;
  padding: 5px;
  margin: 30px;
}


/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  align: center;
}

img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 300px;
}
.imgnegocios{
  width:80%;
}

.fotos{
  width: 85%;
}
</style>
<body>

<!-- Header with image -->
<header class="bgimg w3-display-container w3-grayscale-min" id="home">
 
  <div class="w3-display-bottomright w3-center w3-padding-large">
    <span class="w3-text-white">Atencion a tu medida</span>
  </div>
</header>



<!-- Add a background color and large text to the whole page -->
<div class="w3-sand w3-grayscale w3-large">
<!-- About Container -->
<div class="w3-container" id="empresas">
  <div class="w3-content" style="max-width:700px">

    <p> Contamos con las mejores empresas en el ámbito de la fotografia, cada una para servirte de manera personalizada y a tu gusto, a todo precio. </p>
    <p><strong>Horarios de atencion:</strong> todos los dias 6am to 5pm.</p>
  </div>
</div>

@foreach($empresas as $empresa)
<div class="row">
  <div class="column">
    <h3><b>{{$empresa['nombre']}}</b></h2>
    <hr>
    <img class='imgnegocios' src="{{asset($empresa['imagen'])}}" alt="hola">
    <br><br>
    <b>Mision: </b>{{$empresa['mision']}}
    <br>
    <b>Vision: </b>{{$empresa['vision']}}
  
  
  
  
  </div>
@endforeach


</div>

<!-- Menu Container -->
<br>
  <div class="w3-content" style="max-width:80%" id="trabajos">
 
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Trabajos realizados</span></h5>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRaGHDhZPWjUVdH0x9wPq9BmiMqDtEZbYffA&usqp=CAU" alt="hola">
    <img src="https://www.clikisalud.net/wp-content/uploads/2018/06/reglas-evitar-comer-de-mas-fiestas-eventos-sociales.jpg" alt="hola">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4cjp5huHINviTEzsYwsZv46C9a1ofK8FreA&usqp=CAU" alt="hola">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQbkxfuex7p0ezS92inCfcofBYcqsP9MtPXbA&usqp=CAU" alt="hola">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhayQev-io8ZOO-4Yqs6vBt_k0RQ3Y1DDZ6Q&usqp=CAU" alt="hola">
    <img src="https://i.ytimg.com/vi/OKWbFv6g0rQ/maxresdefault.jpg" alt="hola">
    <img src="https://www.nupciasmagazine.com/wp-content/uploads/2020/03/01-alasdair-elmes-ULHxWq8reao-unsplash.jpg" alt="hola">
    <img src="https://i.pinimg.com/originals/f8/37/da/f837dadd78b1a8ae4de2e47bbcc03778.jpg" alt="hola">
  </div>


<!-- Contact/Area Container -->
<div class="w3-container" id="contactenos" style="padding-bottom:32px;">
  <div class="w3-content" style="max-width:700px">
    <h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide">Contactanos</span></h5>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Nombre" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="number" placeholder="correo" required name="People"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="datetime-local" placeholder="Date and time" required name="date" value="2020-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Detalles del evento" required name="Message"></p>
      <center><p><button class="w3-button w3-black" type="submit">ENVIAR</button></p></center>
    </form>
  </div>
</div>


</div>




</body>
</html>