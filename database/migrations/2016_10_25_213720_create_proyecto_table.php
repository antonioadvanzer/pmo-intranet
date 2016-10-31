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
        //Create table to save project information
        Schema::create('project', function (Blueprint $table){
            $table->increments('id');
            $table->string('name',100);
            $table->string('description',100)->nullable();
            $table->string('client',100)->nullable();
            $table->string('objective',100)->nullable();
            $table->string('scope',100)->nullable();
            $table->boolean('status')->default(1);
            $table->integer('progress');

            /* foreign key --------------------------------- */
            $table->integer('category_project')->unsigned();
            $table->integer('business_unit')->unsigned();
            $table->integer('pmo')->unsigned();
            /* --------------------------------------------- */

            /* id google drive -------- */
            $table->string('link',100);
            /* ------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('category_project')->references('id')->on('category_element');
            $table->foreign('business_unit')->references('id')->on('business_unit');
            $table->foreign('pmo')->references('id')->on('pmo');
            /* --------------------------------------------------------------------------- */
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
