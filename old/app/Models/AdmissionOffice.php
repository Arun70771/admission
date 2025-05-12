<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionOffice extends Model
{
    use HasFactory;

    protected $table = 'admission_office';

    protected $fillable = [
        'id',
        'criteria',
        'marks',
        'concession',
        'check_level_1',
        'check_level_2',
        'final_payment',
    ];
}
