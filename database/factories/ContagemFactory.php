<?php

use Faker\Generator as Faker;

$factory->define(App\Contagem::class, function (Faker $faker) {
    return [
        'id_impressora' => $faker->randomDigitNotNull(),
        'contagem' => $faker->randomDigitNotNull(),
        'data' => $faker->dateTime(),
        'impressora_id' => function () {
            return factory(App\Impressora::class)->create()->id;
        },
        'requisicao_id' => function () {
            return factory(App\Requisicao::class)->create()->id;
        },
    ];
});
