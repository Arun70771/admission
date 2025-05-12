<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalDetail extends Model
{
    use HasFactory;

    // Disable timestamps if not needed
    public $timestamps = false;

    // Allow mass assignment for these fields
    protected $fillable = [
        'board_10th', 
        'marks_10th', 
        'passing_year_10th', 
        'board_12th', 
        'marks_12th',
        'board_bachelors', 
        'marks_bachelors', 
        'board_masters', 
        'marks_masters',
        'specialization_12th',
        'passing_year_12th',
        'passing_status_12th',
        'specialization_bachelor',
        'passing_year_bachelor',
        'passing_status_bachelor',
        'specialization_master',
        'passing_year_master',
        'passing_status_master',
        'national_eligibility_name',
        'passing_status_national',
        'passing_year_national',
        'score_national',
        'marks_name_of_degree',
        'passing_status_qualifying',
        'passing_year_qualifying',
        'score_qualifying',
        'upload_score',
    ];
}

