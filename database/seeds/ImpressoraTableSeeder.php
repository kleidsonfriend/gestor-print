<?php

use Illuminate\Database\Seeder;

class ImpressoraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Impressora::class, 5)->create();
    }
}
