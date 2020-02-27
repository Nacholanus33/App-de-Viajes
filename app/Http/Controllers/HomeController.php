<?php

namespace App\Http\Controllers;
use App\Trip_request;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();
      if($user->role == "passenger"){
        return view('home_passenger');
         } else {
          return view('home_driver',[
            'user'=>$user
          ]);
        }
    }
    public function perfil(){
      $user = Auth::user();
      $viajes = Trip_request::where('user_id','=',$user->id);
      if($user->role == "passenger"){
        return view('perfil_passenger',[
          'user'=>$user,
          'viajes'=>$viajes
        ]);
         } else {
          return view('perfil_driver',[
            'user'=>$user,
            'viajes'=>$viajes
          ]);
        }
    }
}
