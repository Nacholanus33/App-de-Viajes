@extends('layouts.app')

@section('content')
  @include('editar', [
    'method' => 'patch',
])




@endsection
