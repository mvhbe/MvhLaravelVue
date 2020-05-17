<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kalender;
use App\Wedstrijd;
use Faker\Generator as Faker;

$factory->define(
    Wedstrijd::class,
    function (Faker $faker) {
        return [
            'kalender_id' => function() {
                return factory(App\Kalender::class)->create()->id;
            },
            'datum' => $faker->date('Y-m-d'),
            'nummer' => $faker->numberBetween(1, 65535),
            'omschrijving' => $faker->sentence(),
            'sponsor' => $faker->sentence,
            'aanvang' =>$faker->date('H:i:s'),
            'wedstrijdtype_id' => function() {
                return factory(App\Wedstrijdtype::class)->create()->id;
            },
            'opmerkingen' => $faker->sentences(2,true)
        ];
    }
);
