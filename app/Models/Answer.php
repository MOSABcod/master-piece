<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'answer_text',
        'selected_option_id',
        'answer_voice_id',
        'date_submitted',
    ];

    /**
     * Automatically manage created_at and updated_at timestamps.
     *
     * @var bool
     */
    public $timestamps = true;

    // Relationships

    /**
     * Get the user who submitted the answer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the question that the answer belongs to.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the selected option for the answer.
     */
    public function selectedOption()
    {
        return $this->belongsTo(QuestionOption::class, 'selected_option_id');
    }

    /**
     * Get the voice media associated with the answer.
     */
    public function answerVoice()
    {
        return $this->belongsTo(Medium::class, 'answer_voice_id');
    }
}