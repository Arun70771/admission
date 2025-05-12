<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePayment extends Model
{
    use HasFactory;

    // Disable timestamps
    public $timestamps = false;

    // Add the 'name', 'fee', and 'programme_id' attributes to the fillable property
    protected $fillable = ['programme_name', 'course_name', 'slug', 'reg_fee'];
}
