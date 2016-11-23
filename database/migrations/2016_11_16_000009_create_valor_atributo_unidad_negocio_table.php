<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValorAtributoUnidadNegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table to save values of each business unit's attributes
        Schema::create('business_unit_attribute_value', function (Blueprint $table){
            $table->increments('id');

            /* foreign key --------------------------------------- */
            $table->integer('business_unit')->unsigned();
            $table->integer('business_unit_attribute')->unsigned();
            $table->integer('link')->unsigned();
            /* --------------------------------------------------- */

            $table->timestamps();
            $table->softDeletes();

            /* Relations ------------------------------------------------------------------------------- */
            $table->foreign('business_unit')->references('id')->on('business_unit');
            $table->foreign('business_unit_attribute')->references('id')->on('business_unit_attribute');
            $table->foreign('link')->references('id')->on('gd_link');
            /* ----------------------------------------------------------------------------------------- */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('business_unit_attribute_value');
    }
}
