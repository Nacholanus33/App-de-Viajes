<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'patent'=>$faker->text(6),
        'work_from_hour'=>$faker->numberBetween($min = 0, $max = 23),
        if ('work_from_hour' == 23) {
          $horaFinal = 7;
        }
        if ('work_from_hour' == 22) {
          $horaFinal = 6;
        }
        if ('work_from_hour' == 21) {
          $horaFinal = 5;
        }
        if ('work_from_hour' == 20) {
          $horaFinal = 4;
        }
        if ('work_from_hour' == 19) {
          $horaFinal = 3;
        }
        if ('work_from_hour' == 18) {
          $horaFinal = 2;
        }
        if ('work_from_hour' == 17) {
          $horaFinal = 1;
        }
        if ('work_from_hour' == 16) {
          $horaFinal = 0;
        }if('work_from_hour' != 16 && 'work_from_hour' != 17 && 'work_from_hour' != 18 && 'work_from_hour' != 19 && 'work_from_hour' != 20 && 'work_from_hour' != 21 && 'work_from_hour' != 22
         && 'work_from_hour' != 23){
          $horaFinal = 'work_from_hour' + 8;
        },
        'work_to_hour'=>$horaFinal,
    ];
});
