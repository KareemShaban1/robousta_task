<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('seat_number');
            $table->foreignId('trip_id')->nullable()->constrained('trips', 'id')->nullOnDelete();
            $table->foreignId('bus_id')->nullable()->constrained('buses', 'id')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')->nullOnDelete();
            $table->foreignId('start_station_id')->nullable()->constrained('stations', 'id')->nullOnDelete();
            $table->foreignId('end_station_id')->nullable()->constrained('stations', 'id')->nullOnDelete();
            $table->enum('seat_status', ['reserved','not_reserved']);
            $table->string('trip_cost')->nullable();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
