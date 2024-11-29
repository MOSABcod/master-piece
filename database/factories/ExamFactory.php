<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'exam_name'        => 'امتحان ' . $this->faker->unique()->word, // e.g., "امتحان الرياضيات"
            'creator_user_id'  => User::factory()->state(['role' => 1]), // Teacher
            'date_created'     => $this->faker->date(),
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}