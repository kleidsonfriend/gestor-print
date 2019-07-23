<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicaoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicao_usuario', function (Blueprint $table) {
            $table->integer('requisicao_id')->unsigned()->index();
            $table->integer('usuario_id')->unsigned()->index();
            
            $table->foreign('requisicao_id')->references('id')->on('requisicaos');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicao_usuario');
    }
}
