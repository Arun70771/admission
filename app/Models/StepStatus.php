<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepStatus extends Model
{
    use HasFactory;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'step_status';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'application_id',
        'application_form',
        'programme_course',
        'mode_admission',
        'educational_details',
        'upload_documents',
        'preview_finalsubmit',
        'pay_fee',
    ];

      // Define the relationship with the Application model (if exists)
      public function application()
      {
          return $this->belongsTo(Application::class, 'application_id');
      }
      
}
