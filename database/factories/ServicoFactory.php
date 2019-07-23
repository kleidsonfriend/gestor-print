<?php

use Faker\Generator as Faker;

$factory->define(App\Servico::class, function (Faker $faker) {
    return [
        'servico' => $faker->numberBetween(1, 5),
        'descricao' => substr($faker->word(), 0, 191),
    ];
});
