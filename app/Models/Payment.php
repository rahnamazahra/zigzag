<?php

namespace App\Models;

use App\Enums\PaymentType;
use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

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

    public static function calculateBalance($orderId = null)
    {
        $query = self::query();
        if ($orderId) {
            $query->where('order_id', $orderId);
        }
        return $query->sum(DB::raw('amount * transaction_type'));
    }

    public static function calculateDeposit($orderId = null)
    {
        $query = self::where('transaction_type', 1);
        if ($orderId) {
            $query->where('order_id', $orderId);
        }
        return $query->sum('amount');
    }
}
