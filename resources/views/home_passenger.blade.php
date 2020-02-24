@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="content">
                  <div class="title m-b-md">
                      ¿A donde Viaja?
                  </div>
                  <form action="/trip_requests" method="post">
                       @csrf
                  <div class="links">
                      <label>Partida:</label>
                      <input class="form-control" type="text" name="from_address" value="">
                  </div>
                  <div class="links">
                      <label>Destino:</label>
                      <input class="form-control" type="text" name="to_address" value="">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Pedir Viaje</button>
                </div>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
