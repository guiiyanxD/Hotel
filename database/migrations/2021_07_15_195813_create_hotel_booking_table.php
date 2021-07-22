<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_booking', function (Blueprint $table) {
            $table->id();
            $table->foreign('hotel_request_id')->references('id')->on('hotel_requests')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('hotel_booking');
    }
}
