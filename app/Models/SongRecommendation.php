<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SongRecommendation extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model ini
    protected $table = 'song_recommendations';

    // Tentukan kolom mana saja yang dapat diisi secara mass-assignment
    protected $fillable = [
        'user_id',
        'song_id',
        'like',
        'recommendation_date',
    ];

    // Relasi dengan model User, menghubungkan setiap rekomendasi dengan user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
