<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save users
        Schema::create('user', function (Blueprint $table){
            $table->increments('id');
            $table->string('name',100);
            $table->string('last_name',100);
            $table->string('nickname',100);
            $table->string('email')->unique();
            $table->string('password');

            /* foreign key ------------------------ */
            $table->integer('type')->unsigned();
            $table->integer('company')->unsigned()->nullable();
            $table->integer('rol')->unsigned()->nullable();
            $table->integer('pmo')->unsigned()->nullable();
            /* ------------------------------------ */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ----------------------------------------------------------------- */
            $table->foreign('type')->references('id')->on('type_user');
            $table->foreign('company')->references('id')->on('company');
            $table->foreign('rol')->references('id')->on('rol');
            $table->foreign('pmo')->references('id')->on('pmo_project');
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
        Schema::dropifExists('user');
    }
}
