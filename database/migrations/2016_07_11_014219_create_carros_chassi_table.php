<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosChassiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros_chassi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_carro')->unsigned();
            $table->foreign('id_carro')->references('id')->on('carros')->onDelete('cascade');
            $table->string('chassi', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('carros_chassi');
    }
}
