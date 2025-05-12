<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScoreModeOfAdmission extends Model
{
    protected $table = 'score_mode_of_admission';

    protected $fillable = [
        'application_id',
        'qualifying_name',
        'qualifying_name_of_degree',
        'qualifying_passing_status',
        'qualifying_passing_year',
        'qualifying_score',
    ];

    // Relationships can be defined here if needed
    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
    
}
