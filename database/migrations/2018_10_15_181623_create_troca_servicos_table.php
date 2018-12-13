<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrocaServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troca_servicos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->unsignedInteger('serv_sol')->nullable();
            $table->unsignedInteger('id_usr1')->nullable();
            $table->unsignedInteger('serv_dese')->nullable();
            $table->unsignedInteger('id_usr2')->nullable();


            $table->foreign('serv_sol')
                ->references('id')->on('servicos');
            $table->foreign('id_usr1')
                ->references('id_usr')->on('servicos');


            
            $table->foreign('serv_dese')
                ->references('id')->on('servicos');   
            $table->foreign('id_usr2')
                ->references('id_usr')->on('servicos');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('troca_servicos');
    }
}
