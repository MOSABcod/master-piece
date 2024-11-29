<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'exam_name',
        'creator_user_id',
        'date_created',
    ];

    // Relationships

    /**
     * Get the teacher who created the exam.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_user_id');
    }

    /**
     * The classes that belong to the exam.
     */
    public function classes()
    {
        return $this->belongsToMany(Classes::class, 'exam_classes', 'exam_id', 'class_id')
                    ->withTimestamps();
    }

    /**
     * Get the questions for the exam.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the results for the exam.
     */
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}