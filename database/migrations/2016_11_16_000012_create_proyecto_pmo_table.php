<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoPmoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save a pmo by project
        Schema::create('pmo_project', function (Blueprint $table){
            $table->increments('id');

            /* foreign key ------------------------------ */
            $table->integer('project')->unsigned();
            $table->integer('pmo_category')->unsigned();
            /* ------------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ------------------------------------------------- */
            $table->foreign('project')->references('id')->on('project');
            $table->foreign('pmo_category')->references('id')->on('pmo_category');
            /* ----------------------------------------------------------- */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('pmo_project');
    }
}
