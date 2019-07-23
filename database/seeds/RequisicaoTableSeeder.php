<?php

use Illuminate\Database\Seeder;

class RequisicaoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Requisicao::class, 5)->create();
    }
}
