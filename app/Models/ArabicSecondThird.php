<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicSecondThird extends Model
{
    use HasFactory;

    protected $table = 'arabic_second_third'; // Define the table name
    protected $fillable = ['question', 'grade_level']; // Fillable fields

    public function answers()
    {
        return $this->hasMany(ArabicAnswerSecondThird::class, 'question_id');
    }
}
