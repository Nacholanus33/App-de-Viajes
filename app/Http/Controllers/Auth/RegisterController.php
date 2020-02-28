<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\Brand;
use App\Car;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'identification_number' => ['required', 'integer'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'brand_name' => ['string', 'nullable', 'max:255'],
            'patent' => ['string', 'nullable', 'min:6', 'max:6'],
            'work_from_hour' => ['integer', 'nullable',  'min:0', 'max:23'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $user =  User::create([
          'first_name' => $data['first_name'],
          'last_name' => $data['last_name'],
          'identification_number' => $data['identification_number'],
          'name' => $data['first_name'] . " " . $data['last_name'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
          'avatar' => $data['avatar'],
          'role'=>$data['role'],
      ]);
      $file = $data['avatar'];
     $destinationPath = 'img/';
     $originalFile = $file->getClientOriginalName();
     $file->move($destinationPath, $originalFile);

      if($data['role'] == "driver"){
        $brandYaCreada = Brand::where('name', '=', $data['brand_name'])->first();
        if ($data['work_from_hour'] == 23) {
          $horaFinal = 7;
        }
        if ($data['work_from_hour'] == 22) {
          $horaFinal = 6;
        }
        if ($data['work_from_hour'] == 21) {
          $horaFinal = 5;
        }
        if ($data['work_from_hour'] == 20) {
          $horaFinal = 4;
        }
        if ($data['work_from_hour'] == 19) {
          $horaFinal = 3;
        }
        if ($data['work_from_hour'] == 18) {
          $horaFinal = 2;
        }
        if ($data['work_from_hour'] == 17) {
          $horaFinal = 1;
        }
        if ($data['work_from_hour'] == 16) {
          $horaFinal = 0;
        }if($data['work_from_hour'] != 16 && $data['work_from_hour'] != 17 && $data['work_from_hour'] != 18 && $data['work_from_hour'] != 19 && $data['work_from_hour'] != 20 && $data['work_from_hour'] != 21 && $data['work_from_hour'] != 22
         && $data['work_from_hour'] != 23){
          $horaFinal = $data['work_from_hour'] + 8;
        }
        $car = new Car([
          'patent' => $data['patent'],
          'work_from_hour' => $data['work_from_hour'],
          'work_to_hour' => $horaFinal,
        ]);
        if ($brandYaCreada) {
          $car->brand()->associate($brandYaCreada);
        }else {
          $brand = Brand::create([
            'name' => $data['brand_name'],
         ]);
          $car->brand()->associate($brand);
        }
        $car->user()->associate($user);
        $car->save();
       }
       return $user;

      }
}
