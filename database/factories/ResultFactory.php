<?php

namespace Database\Factories;

use App\Models\Result;
use App\Models\User;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
{
    protected $model = Result::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'user_id'    => User::where('role', 0)->inRandomOrder()->first()->id ?? User::factory()->state(['role' => 0]),
            'exam_id'    => Exam::inRandomOrder()->first()->id ?? Exam::factory(),
            'total_score'=> $this->faker->randomFloat(2, 0, 100), // Score out of 100
            'date_taken' => $this->faker->date(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}