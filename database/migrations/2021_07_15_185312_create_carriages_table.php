<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('carriage_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('company_id')->references('id')->on('carriages_company')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('city',45);
            $table->string('province',45);
            $table->string('ubication',45);
            $table->string('goes_to',45);
            $table->unsignedDecimal('price',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carriages');
    }
}
