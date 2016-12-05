<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermisoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save permission zone
        Schema::create('permission', function (Blueprint $table){
            $table->increments('id');

            /* foreign key -------------------- */
            $table->integer('rol')->unsigned();
            /* -------------------------------- */

            /* id or null -------------------- */
            $table->integer('C')->nullable();
            $table->integer('BU')->nullable();
            $table->integer('P')->nullable();
            /* ------------------------------- */

            /* true or false ----------------- */
            $table->boolean('ABU');
            $table->boolean('AP');
            /* ------------------------------- */

            $table->boolean('create');
            $table->boolean('read');
            $table->boolean('update');
            $table->boolean('delete');
            $table->timestamps();
            $table->softDeletes();

            /* Relations --------------------------------------- */
            $table->foreign('rol')->references('id')->on('rol');
            /* ------------------------------------------------- */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('permission');
    }
}
