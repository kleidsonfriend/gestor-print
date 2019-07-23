<?php

use Illuminate\Database\Seeder;

class ContagemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Contagem::class, 5)->create();
    }
}
