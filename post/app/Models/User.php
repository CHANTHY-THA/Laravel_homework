<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Connect database table profile and user
    public Function Profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Relationship User with role 
    public Function Role()
    {
        return $this->hasOne(Roles::class);
    }
    // One use have many post
    public Function Post()
    {
        return $this->hasMany(Post::class);
    }
    // Comment of user 
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
