<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisicaos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_servico');
            $table->integer('id_contagem');
            $table->string('resumo');
            $table->integer('criado_por');
            $table->integer('avaliado_por');
            $table->integer('executado_por');
            $table->integer('concluido_por');
            $table->dateTime('criado_em');
            $table->dateTime('avaliado_em');
            $table->dateTime('executado_em');
            $table->dateTime('concluido_em');
            $table->integer('id_setor');
            $table->integer('id_status');
            $table->integer('proprietario_id')->unsigned()->index();
            $table->integer('servico_id')->unsigned()->index();
            $table->integer('setor_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('proprietario_id')->references('id')->on('proprietarios');
            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->foreign('setor_id')->references('id')->on('setors');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requisicaos');
    }
}
