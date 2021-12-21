@extends ('helpers/navbar')

@section('titulo','Foto')

@section('contenido')


<img class="img2" src="{{ asset($foto)}}" alt="" />

@endsection