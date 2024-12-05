<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MathFirstKg extends Model
{
    use HasFactory;

    protected $table = 'math_first_kg'; // Define table name
    protected $fillable = ['question']; // Fillable fields

    public function answers()
    {
        return $this->hasMany(AnswersMathFirstKg::class, 'question_id');
    }
}
