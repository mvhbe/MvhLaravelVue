<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Uitslag;
use App\UitslagDetail;
use Faker\Generator as Faker;

$factory->define(UitslagDetail::class, function (Faker $faker) {
    return [
        'uitslag_id' => function() {
            return factory(Uitslag::class)->create()->id;
        },
        'volgorde' => $faker->randomNumber(2),
        'gewicht' => $faker->randomNumber(5),
        'deelnemers' => $faker->text(75),
        'plaatsen' => $faker->text(15)
    ];
});
