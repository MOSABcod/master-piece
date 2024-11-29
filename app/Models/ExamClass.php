<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamClass extends Model
{
    use HasFactory;

    protected $table = 'exam_classes'; // Specify the table name

    protected $fillable = [
        'exam_id',
        'class_id',
    ];

    // Relationships

    /**
     * Get the exam associated with the exam_class.
     */
    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    /**
     * Get the class associated with the exam_class.
     */
    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}