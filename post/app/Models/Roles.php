<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = ['role','status'];
    // Use with role relationship 
    public function user()
    {
        return $this->belongsTo(User::class); // child of user
    }
}
