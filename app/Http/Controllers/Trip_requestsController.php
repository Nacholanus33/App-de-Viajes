<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

use App\Trip_request;
use App\User;
use App\Car;

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
      $trip_request = new Trip_request($params);

      $trip_request->user()->associate(Auth::user());
      $trip_request->save();

     $hour = Carbon::now()->subHour(3)->hour;
     $cars = Car::all();
     foreach ($cars as $car) {
       if ($car->work_from_hour >= 0 && $car->work_from_hour <=15 && ($hour > $car->work_from_hour && $hour <= $car->work_from_hour + 8)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 16 && ($hour == 16 || $hour == 17 || $hour == 18 || $hour == 19 || $hour == 20 || $hour == 21 || $hour == 22 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 17 && ($hour == 17 || $hour == 18 || $hour == 19 || $hour == 20 || $hour == 21 || $hour == 22 || $hour == 23 || $hour == 1 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 18 && ($hour == 1 || $hour == 2 || $hour == 18 || $hour == 19 || $hour == 20 || $hour == 21 || $hour == 22 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 19 && ($hour == 1 || $hour == 2 || $hour == 3 || $hour == 19 || $hour == 20 || $hour == 21 || $hour == 22 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 20 && ($hour == 1 || $hour == 2 || $hour == 3 || $hour == 4 || $hour == 20 || $hour == 21 || $hour == 22 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 21 && ($hour == 1 || $hour == 2 || $hour == 3 || $hour == 4 || $hour == 5 || $hour == 21 || $hour == 22 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 22 && ($hour == 1 || $hour == 2 || $hour == 3 || $hour == 4 || $hour == 5 || $hour == 6 || $hour == 22 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }
       if ($car->work_from_hour == 23 && ($hour == 1 || $hour == 2 || $hour == 3 || $hour == 4 || $hour == 5 || $hour == 6 || $hour == 7 || $hour == 23 || $hour == 0)) {
         return redirect()->route('trip',[
           'car'=>$car
         ]);
       }else{
         echo "hola";
       }
     }
      //return redirect()->route('home');
  }
}
