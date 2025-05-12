<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Add this line

class Admin extends Authenticatable
{
    use HasFactory; // Add this line

    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    protected $hidden = [
        'password'
    ];
}