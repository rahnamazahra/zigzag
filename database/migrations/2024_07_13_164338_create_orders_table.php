<?php

use App\Enums\OrderStatus;
use App\Models\Category;
use App\Models\Cloth;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained();
            $table->foreignIdFor(Cloth::class)->constrained();
            $table->unsignedBigInteger('total_price');
            $table->integer('quantity')->default(1);
            $table->unsignedBigInteger('discount')->default(0);
            $table->unsignedTinyInteger('status')->default(OrderStatus::default());
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};