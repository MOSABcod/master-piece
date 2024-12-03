<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathAnswerSecondThird extends Model
{
    use HasFactory;

    protected $table = 'math_answers_second_third'; // Table name
    protected $fillable = ['question_id', 'user_id', 'answer']; // Fillable columns

    /**
     * Relationship to the MathSecondThird model.
     */
    public function question()
    {
        return $this->belongsTo(MathSecondThird::class, 'question_id');
    }

    /**
     * Relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
