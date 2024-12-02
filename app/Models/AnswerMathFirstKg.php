<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerMathFirstKg extends Model
{
    use HasFactory;

    protected $table = 'answers_math_firstkg'; // Define table name
    protected $fillable = ['question_id', 'answer', 'is_correct']; // Fillable fields

    public function question()
    {
        return $this->belongsTo(MathFirstKg::class, 'question_id');
    }
}
