<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_name',
        'father_name',
        'mother_name',
        'guardian_name',
        'dob',
        'gender',
        'email',
        'nationality',
        'country_code',
        'mobile',
        'password',
        'plain_password',
    ];

    // Ensure password is hashed when saved
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
