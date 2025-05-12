<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentResponse extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $fillable = ['is_complete', 'payment','tracking_id','payment_response','application_id'];
}
