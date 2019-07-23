<?php

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'nome' => substr($faker->name(), 0, 191),
        'email' => substr($faker->safeEmail(), 0, 191),
        'tel' => substr($faker->phoneNumber(), 0, 11),
        'id_perfil' => $faker->randomDigitNotNull(),
        'senha' => substr(bcrypt('123456'), 0, 191),
        'perfil_id' => function () {
            return factory(App\Perfil::class)->create()->id;
        },
    ];
});
