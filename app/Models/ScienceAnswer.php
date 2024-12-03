<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScienceAnswers extends Model
{
    use HasFactory;

    protected $table = 'science_answers'; // Table name
    protected $fillable = ['question_id', 'user_id', 'answer']; // Fillable columns

    /**
     * Relationship with Science.
     */
    public function question()
    {
        return $this->belongsTo(Science::class, 'question_id');
    }

    /**
     * Relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
