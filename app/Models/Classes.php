<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Specify the table name

    protected $fillable = [
        'class_name',
    ];

    // Relationships

    /**
     * Get the users associated with the class.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'class_id');
    }
    
    public function exams()
    {
        return $this->belongsToMany(Exam::class, 'exam_classes', 'class_id', 'exam_id');
    }
    /**
     * Get the enrollments for the class.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'class_id');
    }
}