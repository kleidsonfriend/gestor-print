<?php

use Faker\Generator as Faker;

$factory->define(App\Perfil::class, function (Faker $faker) {
    return [
        'perfil' => $faker->numberBetween(1, 5),
        'permissao' => $faker->paragraph(),
    ];
});
