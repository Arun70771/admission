<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    // Add the 'name', 'fee', and 'programme_id' attributes to the fillable property
    protected $fillable = ['course_name', 'course_fee', 'application_id', 'programme_id'];
}
