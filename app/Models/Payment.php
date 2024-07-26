<?php

namespace App\Models;

use App\Enums\PaymentType;
use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'amount',
        'transaction_type',
        'payment_type',
        'balance',
    ];

    protected $casts = [
        'transaction_type' => TransactionType::class,
        'payment_type'     => PaymentType::class,
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

}
