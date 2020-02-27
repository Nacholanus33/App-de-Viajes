@extends('layouts.app')

@section('content')
@include('Funciones')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
      <h1>"Tu auto esta en camino, el chofer es {{$user->name}}, con la foto
      del chofer, el auto es un {{$brand->name}} y la patente es {{hide_patent($car->patent)}}.</h1>
      </div>
    </div>
  </div>
</div>



@endsection
