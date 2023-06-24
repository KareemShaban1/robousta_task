<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trip_cost', function (Blueprint $table) {
            $table->id();
            $table->foreignId('start_station_id')->nullable()->constrained('stations', 'id')->nullOnDelete();
            $table->foreignId('end_station_id')->nullable()->constrained('stations', 'id')->nullOnDelete();
            $table->string('cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_cost');
    }
};
