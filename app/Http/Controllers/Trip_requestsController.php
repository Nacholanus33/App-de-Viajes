<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Trip_request;
use App\User;

class Trip_requestsController extends Controller
{
  public function create()
  {
      return view('welcome', [
          'trip_request' => new Trip_request,
      ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $this->validate($request, [
          'from_address' => 'required',
          'to_address' => 'required',
      ]);

      $params = $request->all();
      $params['estimated_time'] = rand(15,60);
      $params['total_price'] = rand(100,200);
      $trip = new Trip_request($params);

      $trip->user()->associate(Auth::user());
      $trip->save();

      return redirect()->route('home');
  }
}
