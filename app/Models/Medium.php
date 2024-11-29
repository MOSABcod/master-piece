<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_type',
        'media_url',
        'upload_date',
    ];

    // Relationships

    /**
     * Get the questions that have this media as their image.
     */
    public function questionImages()
    {
        return $this->hasMany(Question::class, 'question_image_id');
    }

    /**
     * Get the question options that have this media as their option media.
     */
    public function questionOptions()
    {
        return $this->hasMany(QuestionOption::class, 'option_media_id');
    }

    /**
     * Get the answers that have this media as their voice recording.
     */
    public function answerVoices()
    {
        return $this->hasMany(Answer::class, 'answer_voice_id');
    }
}