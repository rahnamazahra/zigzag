<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cloth extends Model
{
    use HasFactory;

    protected $table = 'clothes';
    protected $fillable = ['name'];

    public function measurements(): BelongsToMany
    {
        return $this->belongsToMany(Measurement::class, 'cloth_measurement', 'cloth_id', 'measurement_id');
    }
}
