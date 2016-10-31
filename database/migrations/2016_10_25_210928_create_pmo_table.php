<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save pmo projects
        Schema::create('pmo', function (Blueprint $table){
            $table->increments('id');
            /* IDs google drive ------------------------*/
            $table->string('organization',100);
            $table->string('model',100);
            $table->string('planning_methodology',100);
            $table->string('tracing',100);
            $table->string('implementation',100);
            $table->string('go_live',100);
            $table->string('close_project',100);
            /*------------------------------------------*/
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('pmo');
    }
}
