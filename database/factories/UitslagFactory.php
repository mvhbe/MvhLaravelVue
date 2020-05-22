<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Uitslag;
use App\Wedstrijd;
use Faker\Generator as Faker;

$factory->define(Uitslag::class, function (Faker $faker) {
    return [
        'wedstrijd_id' => function() {
            return factory(Wedstrijd::class)->create()->id;
        },
        'volgorde' => $faker->randomNumber(2),
        'gewicht' => $faker->randomNumber(5),
        'deelnemers' => $faker->text(75),
        'plaatsen' => $faker->text(15)
    ];
});
