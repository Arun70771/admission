<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeOfAdmission extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['programme', 'mode_of_admission','programme_id','application_id'];
}
