<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save projects information
        Schema::create('project', function (Blueprint $table){
            $table->increments('id');
            $table->string('name',30);
            // check to join to second table
            //$table->integer('customer')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
            //$table->foreign('id_circular')->references('id')->on('circular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('project');
    }
}
