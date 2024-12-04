<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicAnswerSecondThird extends Model
{
    use HasFactory;

    protected $table = 'arabic_answers_second_third'; // Table name
    protected $fillable = ['question_id', 'user_id', 'answer', 'is_correct']; // Fillable columns

    /**
     * Relationship to the ArabicSecondThird model.
     */
    public function question()
    {
        return $this->belongsTo(ArabicSecondThird::class, 'question_id');
    }

    /**
     * Relationship to the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
