<?php

use Illuminate\Database\Seeder;

class ProprietarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Proprietario::class, 5)->create();
    }
}
