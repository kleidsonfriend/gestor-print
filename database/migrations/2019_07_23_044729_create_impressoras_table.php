<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImpressorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('impressoras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_suprimento');
            $table->boolean('impressora');
            $table->text('modelo');
            $table->string('descricao', 191);
            $table->integer('id_proprietario');
            $table->integer('suprimento_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('suprimento_id')->references('id')->on('suprimentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('impressoras');
    }
}
