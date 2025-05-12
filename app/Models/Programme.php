<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    // Add the 'name' attribute to the fillable property
    protected $fillable = ['programme','application_id','course_fee'];
}