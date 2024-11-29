<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'user_id',
    ];

    // Relationships

    /**
     * Get the class associated with the enrollment.
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    /**
     * Get the user associated with the enrollment.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}