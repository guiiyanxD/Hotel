<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarriageBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carriage_booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carriage_request_id');
            $table->foreign('carriage_request_id')->references('id')->on('carriage_requests')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('day_booked');
            $table->decimal('final_price',10,2);
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
        Schema::dropIfExists('carriage_booking');
    }
}
