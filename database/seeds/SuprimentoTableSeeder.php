<?php

use Illuminate\Database\Seeder;

class SuprimentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Suprimento::class, 5)->create();
    }
}
