<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cloth_measurement', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cloth_id')->constrained('clothes');
            $table->foreignId('measurement_id')->constrained('measurements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cloth_measurment');
    }
};
