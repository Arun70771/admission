<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_name', 'father_name', 'dob', 'gender', 'nationality', 'email', 'mobile', 'correspondence_house', 'correspondence_city', 'correspondence_district', 'correspondence_country', 'correspondence_state', 'correspondence_zip', 'permanent_house', 'permanent_city', 'permanent_district', 'permanent_country', 'permanent_state', 'permanent_zip'];

    public function educationalDetails()
    {
        return $this->hasMany(EducationalDetail::class, 'application_id', 'application_id');
    }

    public function documentUploads()
    {
        return $this->hasMany(DocumentUpload::class, 'application_id', 'application_id');
    }

    public function payments()
    {
        return $this->hasOne(Payment::class, 'application_id', 'application_id');
    }
}

