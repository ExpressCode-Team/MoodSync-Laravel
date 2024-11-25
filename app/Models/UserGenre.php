<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGenre extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_genres';

    protected $fillable = [
        'user_id',
        'genre_id',
    ];

    // Relasi dengan User dan Genre
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
