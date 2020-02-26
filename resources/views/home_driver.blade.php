@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="content">
                <img src='{{ asset('img/'.$user['avatar']) }}'>
                {{$user->name}}
                Hola
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
