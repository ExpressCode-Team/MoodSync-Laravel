<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expression extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name (if it's different from the plural form of the model)
    protected $table = 'expressions';

    // Specify the primary key column name
    protected $primaryKey = 'expression_id';

    // Indicate that the primary key is not auto-incrementing
    public $incrementing = false;

    // Allow mass assignment for the following columns
    protected $fillable = [
        'expression_id',
        'expression_name',
    ];

    // Cast the expression_id to a string, as it's not an auto-incrementing integer
    protected $casts = [
        'expression_id' => 'string',
    ];

    // Define the relationships if necessary (e.g., HistoryExpression relationship)
    public function historyExpressions()
    {
        return $this->hasMany(HistoryExpression::class, 'expression_id');
    }
}
