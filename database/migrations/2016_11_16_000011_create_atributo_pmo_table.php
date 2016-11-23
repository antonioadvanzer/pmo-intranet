<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtributoPmoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create table to save pmo atributes
        Schema::create('pmo_attribute', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');

            /* foreign key ------------------------------ */
            $table->integer('pmo_category')->unsigned();
            /* ------------------------------------------ */

            $table->string('icon',30);
            $table->timestamps();
            $table->softDeletes();

            /* Relations --------------------------------------------------------- */
            $table->foreign('pmo_category')->references('id')->on('pmo_category');
            /* ------------------------------------------------------------------- */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('pmo_attribute');
    }
}
