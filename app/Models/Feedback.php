<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Specify the table if it's different from the plural form of the model name
    protected $table = 'feedbacks';

    // Mass assignable attributes
    protected $fillable = [
        'recommendation_id',
        'rating',
        'comment',
    ];

    /**
     * Get the recommendation that owns the feedback.
     */
    // public function recommendation()
    // {
    //     return $this->belongsTo(Recommendation::class);
    // }

}
