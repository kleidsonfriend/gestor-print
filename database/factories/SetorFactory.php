<?php

use Faker\Generator as Faker;

$factory->define(App\Setor::class, function (Faker $faker) {
    return [
        'setor' => $faker->numberBetween(1, 5),
        'sigla' => $faker->paragraph(),
        'gerente' => $faker->randomDigitNotNull(),
        'usuario_id' => function () {
            return factory(App\Usuario::class)->create()->id;
        },
    ];
});
