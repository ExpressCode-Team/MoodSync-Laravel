<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tabel tidak sesuai dengan konvensi Laravel
    protected $table = 'feedbacks';

    // Tentukan kolom yang bisa diisi (mass-assignable)
    protected $fillable = [
        'feedback_id',
        'rating',
        'comment',
        'created_at',
        'updated_at',
    ];
}