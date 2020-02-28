@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="padding-left:20px;padding-right:20px;padding-top:10px;">
              <div class="content">
                  <div style="font-size:20px;font-weight:bold;"class="title m-b-md">
                      ¿A donde Viaja?
                  </div>
                  <form action="/trip_requests" method="post">
                       @csrf
                  <div class="links">
                      <label>Partida:</label>
                      <input class="form-control @error('from_address') is-invalid @enderror" type="text" name="from_address" value="{{old('from_address')}}" required autocomplete="from_address" autofocus>
                        @error('from_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="links">
                      <label>Destino:</label>
                      <input class="form-control @error('to_address') is-invalid @enderror" type="text" name="to_address" value="{{old('to_address')}}" required autocomplete="to_address" autofocus>
                        @error('to_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <br>
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
