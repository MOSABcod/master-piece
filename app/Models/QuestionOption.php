<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_text',
        'option_media_id',
        'is_correct',
    ];

    // Relationships

    /**
     * Get the question that owns the option.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the media associated with the option.
     */
    public function optionMedia()
    {
        return $this->belongsTo(Medium::class, 'option_media_id');
    }

    /**
     * Get the answers that selected this option.
     */
    public function selectedAnswers()
    {
        return $this->hasMany(Answer::class, 'selected_option_id');
    }
}