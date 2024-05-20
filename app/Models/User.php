<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // Admin
    // Editor - Post/ Categories
    // User - Like / Comments

    // Roles

    const RULE_ADMIN = 'ADMIN';
    const RULE_EDITOR = 'EDITOR';
    const RULE_USER = 'USER';

    const ROLES = [
        self::RULE_ADMIN => 'Admin',
        self::RULE_EDITOR => 'Editor',
        self::RULE_USER => 'User',
    ];



    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationship with Listings

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($role)
    {
        return $this->roles->contains('user_id', $role->id);
    }
}
