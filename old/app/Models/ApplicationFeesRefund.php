<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationFeesRefund extends Model
{
    use HasFactory;

    protected $table = 'application_fees_refund';

    // Define fillable attributes for mass assignment
    protected $fillable = [
        'name', 'email', 'father_name', 'dob', 'nationality', 'reason_of_withdrawal', 'amount'
    ];
}
