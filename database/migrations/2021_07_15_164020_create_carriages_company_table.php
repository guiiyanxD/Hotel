<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriagesCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriages_company', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
            $table->unsignedSmallInteger('qty_cars')->default(1);
            $table->string('phone_number',15);
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
        Schema::dropIfExists('carriages_company');
    }
}
