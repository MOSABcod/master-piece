<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_id',
        'category_id',
        'question_text',
        'question_image_id',
        'question_order',
        'answer_type',
    ];

    // Relationships

    /**
     * Get the exam that owns the question.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    /**
     * Get the category that owns the question.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the media image for the question.
     */
    public function questionImage()
    {
        return $this->belongsTo(Medium::class, 'question_image_id');
    }

    /**
     * Get the options for the question.
     */
    public function questionOptions()
    {
        return $this->hasMany(QuestionOption::class);
    }

    /**
     * Get the answers for the question.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}