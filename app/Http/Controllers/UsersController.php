<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Trip_request;
use App\Car;
use App\Brand;
use App\Trip;
use App\User;

class UsersController extends Controller
{
  public function index(){
    $user = Auth::user();
    if($user->role == "passenger"){
      return view('perfil_passenger',[
        'user'=>$user
      ]);
       } else {
        return view('perfil_driver',[
          'user'=>$user
        ]);
      }
  }

  public function edit()
    {
      $user = Auth::user();
      return view('perfil_edit', [
          'user' => $user,
      ]);
    }
    public function update(Request $request)
    {
      $user = Auth::user();

      $user->update($request->all());

      return redirect('/perfil');
    }
    public function perfil(){
      $user = Auth::user();
      $viajes = Trip_request::where('user_id','=',$user->id)->get();
      if($user->role == "passenger"){
        return view('perfil_passenger',[
          'user'=>$user,
          'viajes'=>$viajes
        ]);
         } else {
           $car=Car::where('user_id','=',$user->id)->first();
           $brand=Brand::find($car->brand_id)->first();
           $viajes = Trip::where('car_id','=',$car->id)->get();
          return view('perfil_driver',[
            'user'=>$user,
            'car'=>$car,
            'brand'=>$brand,
            'viajes'=>$viajes
          ]);
        }
    }
}
