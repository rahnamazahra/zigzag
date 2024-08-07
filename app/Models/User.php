<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mobile',
        'password',
        'tailor_id',
        'national_code',
        'postal_code',
        'address',
        'location'
    ];

    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'  => 'datetime',
            'mobile_verified_at' => 'datetime',
            'password'           => 'hashed',
        ];
    }

    public function customers(): HasMany
    {
        return $this->hasMany(User::class, 'tailor_id');
    }

    public function tailors():HasMany
    {
        return $this->hasMany(User::class, 'tailor_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'tailor_id');
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

}
