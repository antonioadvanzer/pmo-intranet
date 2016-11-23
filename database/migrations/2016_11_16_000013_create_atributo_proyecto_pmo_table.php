<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtributoProyectoPmoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save a pmo by project
        Schema::create('pmo_project_attribute', function (Blueprint $table){
            $table->increments('id');

            /* foreign key ------------------------------ */
            $table->integer('pmo_project')->unsigned();
            $table->integer('pmo_attribute')->unsigned();
            $table->integer('link')->unsigned();
            /* ------------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ------------------------------------------------- */
            $table->foreign('pmo_project')->references('id')->on('pmo_project');
            $table->foreign('pmo_attribute')->references('id')->on('pmo_attribute');
            $table->foreign('link')->references('id')->on('gd_link');
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
        Schema::dropifExists('pmo_project_attribute');
    }
}
