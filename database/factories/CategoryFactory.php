<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        $categories = ['الرياضيات', 'العلوم', 'التاريخ', 'الجغرافيا', 'اللغة العربية', 'اللغة الإنجليزية'];
        return [
            'category_name' => $this->faker->unique()->randomElement($categories),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}