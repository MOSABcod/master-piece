<?php

namespace Database\Factories;

use App\Models\Answer;
use App\Models\User;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Medium;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    protected $model = Answer::class;

    /**
     * Define the model's default state.
     */
    public function definition()
    {
        $question = Question::inRandomOrder()->first();

        if (!$question) {
            $question = Question::factory()->create();
        }

        $data = [
            'user_id'            => User::where('role', 0)->inRandomOrder()->first()->id ?? User::factory()->state(['role' => 0]),
            'question_id'        => $question->id,
            'date_submitted'     => $this->faker->dateTimeBetween('-1 months', 'now'),
            'answer_text'        => null,
            'selected_option_id' => null,
            'answer_voice_id'    => null,
            'created_at'         => now(),
            'updated_at'         => now(),
        ];

        if ($question->answer_type === 0) { // Radio
            $selectedOption = $question->questionOptions->random();
            $data['selected_option_id'] = $selectedOption->id;
        } else { // Input
            // Optionally, attach a voice recording
            if ($this->faker->boolean(30)) {
                $voice = Medium::factory()->create(['media_type' => 'Voice']);
                $data['answer_voice_id'] = $voice->id;
            }
            $data['answer_text'] = 'هذا إجابة تجريبية.'; // "This is a sample answer."
        }

        return $data;
    }
}