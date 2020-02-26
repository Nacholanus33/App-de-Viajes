@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h2>{{$user->first_name . " " . $user->last_name . " Bienvenido a tu Perfil"}}</h2>
    </div>
    <div class="col-md-8">
      <h4>Datos:</h4>
    </div>
    <div class="col-md-8">
      <ul>
        <li>Nombre: {{$user->first_name}}</li>
        <li>Apellido: {{$user->last_name}}</li>
        <li>DNI: {{$user->identification_number}}</li>
        <li>Email: {{$user->email}}</li>
        <li><form action="perfil_edit" method="post">
    <input class="" type="submit" value="Editar Perfil"/>
     @method('post')
     @csrf
   </form></li>
      </ul>
    </div>
  </div>
</div>



@endsection
