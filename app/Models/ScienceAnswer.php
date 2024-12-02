<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScienceAnswer extends Model
{
    use HasFactory;

    protected $table = 'science_answers'; // Table name
    protected $fillable = ['question_id', 'answer', 'is_correct']; // Fillable fields

    public function question()
    {
        return $this->belongsTo(Science::class, 'question_id');
    }
}
