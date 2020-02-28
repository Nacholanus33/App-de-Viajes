@extends('layouts.app')

@section('content')
@php
use App\Trip_request;
use App\Car;
use App\Brand;
use App\Trip;
use App\User;

@endphp
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
        <form action="perfil_edit" method="post">
    <input class="btn btn-primary" type="submit" value="Editar Perfil"/>
     @method('post')
     @csrf
   </form>
      </ul>
    </div>
    <div class="col-md-8">
      <h4>Viajes Realizados:</h4>
    </div>
    <div class="col-md-8">
      <ol><?php foreach ($viajes as $viaje) :
          $viajeRealizado = Trip::where('trip_request_id','=',$viaje->id)->first();
          $auto = Car::find($viajeRealizado->car_id);
          $chofer = User::find($auto->user_id);
          $marcaAuto = Brand::find($auto->brand_id);
          ?>
        <li>Desde: {{$viaje->from_address}} <br>Hasta: {{$viaje->to_address}}<br>Precio: ${{$viaje->total_price}} <br>Tiempo recorrido: {{$viaje->estimated_time}} Minutos <br> Chofer: {{$chofer->name}} <br> Auto: {{$marcaAuto->name}} </li>
        <form id="enviar_comentario" action="{{ action('CommentsController@create', ['id' => $viajeRealizado->id]) }}" method="POST">

    <input class="btn btn-primary" type="submit" value="Agregar Comentario"/>
     @csrf
   </form>
   <br> <br>
           <?php endforeach ?>
      </ol>
    </div>
  </div>
</div>



@endsection
