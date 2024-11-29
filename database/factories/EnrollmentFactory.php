<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'class_id' => Classes::inRandomOrder()->first()->id ?? Classes::factory(),
            'user_id'  => User::where('role', 0)->inRandomOrder()->first()->id ?? User::factory()->state(['role' => 0]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}