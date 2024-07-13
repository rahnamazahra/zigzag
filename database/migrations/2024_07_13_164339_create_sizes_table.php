<?php

use App\Models\Measurment;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::Class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Measurment::Class)->constrained();
            $table->string('value');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
