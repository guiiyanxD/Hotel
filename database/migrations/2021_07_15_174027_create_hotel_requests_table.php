<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_requests', function (Blueprint $table) {
            $table->id();
            $table->foreign('client_id')->references('id')->on('clients')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('hotel_id')->references('id')->on('hotel')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('city', 45);
            $table->string('ubication', 45);
            $table->date('date_in');
            $table->date('date_out');
            $table->integer('rooms');
            $table->smallInteger('qty_adults');
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
        Schema::dropIfExists('hotel_requests');
    }
}
