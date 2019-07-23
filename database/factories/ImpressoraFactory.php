<?php

use Faker\Generator as Faker;

$factory->define(App\Impressora::class, function (Faker $faker) {
    return [
        'id_suprimento' => $faker->randomDigitNotNull(),
        'impressora' => $faker->numberBetween(1, 5),
        'modelo' => $faker->paragraph(),
        'descricao' => substr($faker->word(), 0, 191),
        'id_proprietario' => $faker->randomDigitNotNull(),
        'suprimento_id' => function () {
            return factory(App\Suprimento::class)->create()->id;
        },
    ];
});
