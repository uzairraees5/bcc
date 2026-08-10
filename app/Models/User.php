<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'is_admin', 'role'];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
        ];
    }

    public function isSeoAdmin(): bool
    {
        // In this project the main admin account is the designated SEO administrator.
        // Other authenticated blog users do not receive SEO access unless explicitly
        // assigned one of the dedicated SEO roles.
        return $this->is_admin && in_array($this->role, ['admin', 'seo_admin', 'super_admin'], true);
    }
}
