<?php

use App\Enums\InvoiceStatus;
use App\Models\invoice;
use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Order::class)->constrained();
            $table->string('invoice_number')->unique();
            $table->unsignedBigInteger('Deposit');
            $table->unsignedBigInteger('total_price');
            $table->unsignedBigInteger('discount_price');
            $table->unsignedTinyInteger('status')->default(InvoiceStatus::default());
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
