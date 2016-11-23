<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorAtributoProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table to save values of each project's attributes
        Schema::create('project_attribute_value', function (Blueprint $table){
            $table->increments('id');

            /* foreign key ---------------------------------- */
            $table->integer('project')->unsigned();
            $table->integer('project_attribute')->unsigned();
            $table->integer('link')->unsigned();
            /* ---------------------------------------------- */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ------------------------------------------------------------------- */
            $table->foreign('project')->references('id')->on('project');
            $table->foreign('project_attribute')->references('id')->on('project_attribute');
            $table->foreign('link')->references('id')->on('gd_link');
            /* ----------------------------------------------------------------------------- */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('project_attribute_value');
    }
}
