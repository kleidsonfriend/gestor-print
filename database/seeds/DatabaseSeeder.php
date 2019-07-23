<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ImpressoraTableSeeder::class);
        $this->call(SuprimentoTableSeeder::class);
        $this->call(ProprietarioTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(PerfilTableSeeder::class);
        $this->call(SetorTableSeeder::class);
        $this->call(RequisicaoTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(ContagemTableSeeder::class);
        $this->call(ServicoTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
