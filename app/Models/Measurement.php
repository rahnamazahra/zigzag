<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Measurement extends Model
{
    use HasFactory;
    protected $table = 'measurements';
    protected $fillable = ['title'];

    public function clothes(): BelongsToMany
    {
        return $this->belongsToMany(cloth::class, 'cloth_measurement', 'measurement_id', 'cloth_id');
    }
}
