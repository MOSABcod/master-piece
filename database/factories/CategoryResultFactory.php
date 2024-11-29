<?php

namespace Database\Factories;

use App\Models\CategoryResult;
use App\Models\Result;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryResultFactory extends Factory
{
    protected $model = CategoryResult::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'result_id'      => Result::inRandomOrder()->first()->id ?? Result::factory(),
            'category_id'    => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'category_score' => $this->faker->randomFloat(2, 0, 100), // Score out of 100
            'created_at'     => now(),
            'updated_at'     => now(),
        ];
    }
}