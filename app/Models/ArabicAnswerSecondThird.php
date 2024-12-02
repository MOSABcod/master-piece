<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicAnswerSecondThird extends Model
{
    use HasFactory;

    protected $table = 'arabic_answers_second_third'; // Define the table name
    protected $fillable = ['question_id', 'answer', 'is_correct']; // Fillable fields

    public function question()
    {
        return $this->belongsTo(ArabicSecondThird::class, 'question_id');
    }
}
