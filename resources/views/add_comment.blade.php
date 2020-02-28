@extends('layouts.app')

@section('content')
  <div class="container">

  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Agregar Comentario') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ action('CommentsController@store', ['id' => $id]) }}">
                      @csrf

                      <div class="form-group row">
                          <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Rating(1 a 5)') }}</label>

                          <div class="col-md-6">
                              <input id="rating" type="text" class="form-control @error('rating') is-invalid @enderror" name="rating" value="{{ old('rating') }}" required autocomplete="rating" autofocus>

                              @error('rating')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Comentario') }}</label>

                          <div class="col-md-6">
                              <input id="content" type="text" value="{{old('content')}}" class="form-control @error('content') is-invalid @enderror" name="content" required autocomplete="content">

                              @error('content')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Enviar Comentario') }}
                              </button>
                    </div>
                      </div>
                    </div>
                  </div>





@endsection
