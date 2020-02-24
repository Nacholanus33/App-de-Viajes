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
            'patent' => ['string', 'nullable', 'max:255'],
            'work_from_hour' => ['integer', 'nullable',  'min:0', 'max:23'],
            'work_to_hour' => ['integer', 'nullable', 'min:0', 'max:23'],
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
          'avatar' => 'hola',
          'role'=>$data['role'],
      ]);


      if($data['role'] == "driver"){
         $brand = Brand::create([
           'name' => $data['brand_name'],
        ]);
        $car = new Car([
          'patent' => $data['patent'],
          'work_from_hour' => $data['work_from_hour'],
          'work_to_hour' => $data['work_to_hour'],
        ]);
        $car->user()->associate($user);
        $car->brand()->associate($brand);
        $car->save();
       }
       return $user;

      }
}
