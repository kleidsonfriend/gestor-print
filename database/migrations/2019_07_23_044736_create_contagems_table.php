<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contagems', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_impressora');
            $table->integer('contagem');
            $table->dateTime('data');
            $table->integer('impressora_id')->unsigned()->index();
            $table->integer('requisicao_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('impressora_id')->references('id')->on('impressoras');
            $table->foreign('requisicao_id')->references('id')->on('requisicaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contagems');
    }
}
