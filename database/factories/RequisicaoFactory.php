<?php

use Faker\Generator as Faker;

$factory->define(App\Requisicao::class, function (Faker $faker) {
    return [
        'id_servico' => $faker->randomDigitNotNull(),
        'id_contagem' => $faker->randomDigitNotNull(),
        'resumo' => $faker->word(),
        'criado_por' => $faker->randomDigitNotNull(),
        'avaliado_por' => $faker->randomDigitNotNull(),
        'executado_por' => $faker->randomDigitNotNull(),
        'concluido_por' => $faker->randomDigitNotNull(),
        'criado_em' => $faker->dateTime(),
        'avaliado_em' => $faker->dateTime(),
        'executado_em' => $faker->dateTime(),
        'concluido_em' => $faker->dateTime(),
        'id_setor' => $faker->randomDigitNotNull(),
        'id_status' => $faker->randomDigitNotNull(),
        'proprietario_id' => function () {
            return factory(App\Proprietario::class)->create()->id;
        },
        'servico_id' => function () {
            return factory(App\Servico::class)->create()->id;
        },
        'setor_id' => function () {
            return factory(App\Setor::class)->create()->id;
        },
        'status_id' => function () {
            return factory(App\Status::class)->create()->id;
        },
    ];
});
