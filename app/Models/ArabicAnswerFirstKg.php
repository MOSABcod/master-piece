<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicAnswerFirstKg extends Model
{
    use HasFactory;

    protected $table = 'arabic_answers_first_kg'; // Table name
    protected $fillable = ['question_id', 'answer', 'is_correct']; // Fillable fields

    public function question()
    {
        return $this->belongsTo(ArabicFirstKg::class, 'question_id');
    }
}
