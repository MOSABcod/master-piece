<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswersMathFirstKg extends Model
{
    use HasFactory;

    protected $table = 'answers_math_firstkg'; // Table name
    protected $fillable = ['question_id', 'user_id', 'answer']; // Fillable columns

    /**
     * Relationship to the MathFirstKg model.
     */
    public function question()
    {
        return $this->belongsTo(MathFirstKg::class, 'question_id');
    }

    /**
     * Relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
