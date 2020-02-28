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
        <li><form action="perfil_edit" method="post">
    <input class="btn btn-primary" type="submit" value="Editar Perfil"/>
     @method('post')
     @csrf
   </form></li>
      </ul>
    </div>
    <div class="col-md-8">
      <h4>Datos del Auto:</h4>
    </div>
    <div class="col-md-8">
      <ul>
        <li>Marca: {{$brand->name}}</li>
        <li>Patente: {{$car->patent}}</li>
        <li>Hora en la que comienzas a trabajar: {{$car->work_from_hour}}</li>
        <li>Hora en la que dejas de trabajar: {{$car->work_to_hour}}</li>
      </ul>
    </div>
    <div class="col-md-8">
      <h4>Viajes Realizados:</h4>
    </div>
    <div class="col-md-8">
      <ol><?php foreach ($viajes as $viaje) :
          $viajesRealizados = Trip_request::find($viaje->trip_request_id)->get();
          ?>
          <?php endforeach ?>
          <?php foreach ($viajesRealizados as $viajeRealizado) :
            ?>
        <li>Desde: {{$viajeRealizado->from_address}} <br>Hasta: {{$viajeRealizado->to_address}}<br>Precio: ${{$viajeRealizado->total_price}} <br>Tiempo recorrido: {{$viajeRealizado->estimated_time}} Minutos </li>
           <?php endforeach ?>
      </ol>
    </div>
  </div>
</div>



@endsection
