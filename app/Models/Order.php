<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['tailor_id', 'customer_id', 'category_id', 'cloth_id', 'quantity', 'price', 'description'];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function tailor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'tailor_id');
    }

    public function clothingType(): BelongsTo
    {
        return $this->belongsTo(Cloth::class, 'cloth_id');
    }

    public function sizes(): HasMany
    {
        return $this->hasMany(Size::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function cloth(): BelongsTo
    {
        return $this->belongsTo(Cloth::class, 'cloth_id');
    }
}
