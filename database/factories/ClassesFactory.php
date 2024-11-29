<?php

namespace Database\Factories;

use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassesFactory extends Factory
{
    protected $model = Classes::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'class_name' => 'الصف ' . $this->faker->unique()->numberBetween(1, 6), // e.g., "الصف 1"
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}