<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'exam_id',
        'generated_by',
        'response',
    ];

    /**
     * Get the user associated with the roadmap.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function roadmaps()
    {
        return $this->hasMany(Roadmap::class);
    }
    /**
     * Get the exam associated with the roadmap.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}