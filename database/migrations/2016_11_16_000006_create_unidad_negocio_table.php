<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadNegocioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table to save business units
        Schema::create('business_unit', function (Blueprint $table){
            $table->increments('id');
            $table->string('name',30);
            $table->string('description',100);

            /* foreign key ----------------------- */
            $table->integer('company')->unsigned();
            /* ----------------------------------- */

            $table->string('icon',30);
            $table->timestamps();
            $table->softDeletes();

            /* Relations ---------------------------------------------- */
            $table->foreign('company')->references('id')->on('company');
            /* -------------------------------------------------------- */

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('business_unit');
    }
}
