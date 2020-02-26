<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
}
