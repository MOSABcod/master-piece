<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathSecondThird extends Model
{
    use HasFactory;

    protected $table = 'math_second_third'; // Table name
    protected $fillable = ['question', 'grade_level']; // Fillable columns

    public function answers()
    {
        return $this->hasMany(MathAnswerSecondThird::class, 'question_id');
    }
}
