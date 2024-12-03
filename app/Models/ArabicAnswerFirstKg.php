<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicAnswerFirstKg extends Model
{
    use HasFactory;

    protected $table = 'arabic_answers_first_kg'; // Table name
    protected $fillable = ['question_id', 'user_id', 'answer', 'is_correct']; // Fillable columns

    /**
     * Relationship with ArabicFirstKg.
     */
    public function question()
    {
        return $this->belongsTo(ArabicFirstKg::class, 'question_id');
    }

    /**
     * Relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
