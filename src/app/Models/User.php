<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Attributes hidden in JSON response.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Attribute casting rules.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // jika kamu ingin hashing otomatis gunakan ini
            // 'password' => 'hashed',
        ];
    }

    // =====================================
    // JWT METHODS - required by JWTSubject
    // =====================================

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
