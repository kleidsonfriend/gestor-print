<?php

use Faker\Generator as Faker;

$factory->define(App\Suprimento::class, function (Faker $faker) {
    return [
        'tipo' => $faker->numberBetween(1, 5),
        'referencia' => $faker->numberBetween(1, 5),
    ];
});
