<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryExpression extends Model
{
    use HasFactory, SoftDeletes;

    // Specify the table name (if it's different from the plural form of the model)
    protected $table = 'history_expressions';

    // Specify the primary key column name
    protected $primaryKey = 'history_expression_id';

    // Allow mass assignment for the following columns
    protected $fillable = [
        'user_id',
        'expression_id',
    ];

    // Define the relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expression()
    {
        return $this->belongsTo(Expression::class, 'expression_id');
    }
}
