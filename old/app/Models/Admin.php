<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function roletype()
    {
        return $this->belongsTo(Adminrole::class,'role_id');
    }

    

}
