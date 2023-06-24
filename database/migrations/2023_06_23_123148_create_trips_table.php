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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bus_id')->nullable()->constrained('buses', 'id')->nullOnDelete();
            $table->foreignId('start_station_id')->nullable()->constrained('stations', 'id')->nullOnDelete();
            $table->foreignId('end_station_id')->nullable()->constrained('stations', 'id')->nullOnDelete();
            $table->string('trip_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
