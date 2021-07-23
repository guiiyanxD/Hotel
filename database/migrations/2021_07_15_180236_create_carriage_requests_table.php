<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriageRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriage_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('carriage_company_id');
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('carriage_company_id')->references('id')->on('carriages_company')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('city',45);
            $table->string('province_from',45);
            $table->string('ubication_from',45);
            $table->date('trip_date');
            $table->smallInteger('qty_passengers');
            $table->string('province_to',45);
            $table->string('ubication_to',45);
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
        Schema::dropIfExists('carriage_requests');
    }
}
