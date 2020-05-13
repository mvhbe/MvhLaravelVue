<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kalender;
use Faker\Generator as Faker;

$factory->define(
    Kalender::class,
    function (Faker $faker) {
        return [
            'jaar' => $faker->year,
            'opmerkingen' => $faker->sentence()
        ];
    }
);
