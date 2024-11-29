<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',
        'total_score',
        'date_taken',
    ];

    // Relationships

    /**
     * Get the user who achieved the result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the exam associated with the result.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get the category results for the result.
     */
    public function categoryResults()
    {
        return $this->hasMany(CategoryResult::class);
    }
}