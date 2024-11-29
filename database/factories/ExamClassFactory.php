<?php

namespace Database\Factories;

use App\Models\ExamClass;
use App\Models\Exam;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamClassFactory extends Factory
{
    protected $model = ExamClass::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'exam_id'  => Exam::factory(),
            'class_id' => Classes::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}