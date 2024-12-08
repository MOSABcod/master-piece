<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roadmap extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'generated_by',
        'response',
        'result',
        'score',
        'level',
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
}
