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
        'totaal_gewicht' => $faker->randomNumber(6),
        'aantal_deelnemers' => $faker->randomNumber(2),
        'gemiddeld_gewicht' => $faker->randomNumber(5),
    ];
});
