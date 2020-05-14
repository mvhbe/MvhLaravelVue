<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wedstrijdtype;
use Faker\Generator as Faker;

$factory->define(
    Wedstrijdtype::class,
    function (Faker $faker) {
        return [
            'omschrijving' => $faker->sentence
        ];
    }
);
