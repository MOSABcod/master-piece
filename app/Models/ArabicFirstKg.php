<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArabicFirstKg extends Model
{
    use HasFactory;

    protected $table = 'arabic_first_kg'; // Table name
    protected $fillable = ['question']; // Fillable fields

    public function answers()
    {
        return $this->hasMany(ArabicAnswerFirstKg::class, 'question_id');
    }
}
