<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained('users', 'id');
            $table->foreignId('destination_id')->constrained('destinations');
            $table->date('BookingDate')->nullable();
            $table->string('PackageType')->nullable();
            $table->integer('NumTravelers')->nullable();
            $table->decimal('TotalAmount', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
