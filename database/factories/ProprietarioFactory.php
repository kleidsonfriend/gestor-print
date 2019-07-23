<?php

use Faker\Generator as Faker;

$factory->define(App\Proprietario::class, function (Faker $faker) {
    return [
        'proprietario' => $faker->numberBetween(1, 5),
    ];
});
