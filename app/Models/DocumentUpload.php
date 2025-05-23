<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type',
        'document_path',
        'application_id',
    ];
}

