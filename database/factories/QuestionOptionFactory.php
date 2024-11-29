<?php

namespace Database\Factories;

use App\Models\QuestionOption;
use App\Models\Question;
use App\Models\Medium;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionOptionFactory extends Factory
{
    protected $model = QuestionOption::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'question_id'      => Question::inRandomOrder()->first()->id ?? Question::factory(),
            'option_text'      => $this->faker->sentence,
            'option_media_id'  => $this->faker->boolean(20) ? Medium::factory()->state(['media_type' => 'Image']) : null,
            'is_correct'       => false, // Will be set manually in seeder
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}