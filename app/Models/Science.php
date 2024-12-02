<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Science extends Model
{
    use HasFactory;

    protected $table = 'science'; // Table name
    protected $fillable = ['question', 'topic']; // Fillable fields

    public function answers()
    {
        return $this->hasMany(ScienceAnswer::class, 'question_id');
    }
}
