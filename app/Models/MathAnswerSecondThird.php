<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathAnswerSecondThird extends Model
{
    use HasFactory;

    protected $table = 'math_answers_second_third'; // Table name
    protected $fillable = ['question_id', 'answer', 'is_correct']; // Fillable columns

    public function question()
    {
        return $this->belongsTo(MathSecondThird::class, 'question_id');
    }
}
