<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Exam;
use App\Models\Category;
use App\Models\Medium;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        // Randomly decide answer type
        $answerType = $this->faker->randomElement([0, 1]); // 0: Radio, 1: Input

        return [
            'exam_id'          => Exam::inRandomOrder()->first()->id ?? Exam::factory(),
            'category_id'      => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'question_text'    => $this->faker->sentence,
            'question_image_id'=> $this->faker->boolean(30) ? Medium::factory()->state(['media_type' => 'Image']) : null,
            'question_order'   => $this->faker->numberBetween(1, 20),
            'answer_type'      => $answerType, // 0 or 1
            'created_at'       => now(),
            'updated_at'       => now(),
        ];
    }
}