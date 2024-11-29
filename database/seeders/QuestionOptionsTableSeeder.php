<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\QuestionOption;

class QuestionOptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all questions with 'Radio' answer type (0)
        $questions = Question::where('answer_type', 0)->get();

        foreach ($questions as $question) {
            // Create 4 options per question
            $options = QuestionOption::factory()->count(4)->create([
                'question_id' => $question->id,
            ]);

            // Randomly set one option as correct
            $correctOption = $options->random();
            $correctOption->is_correct = true;
            $correctOption->save();
        }
    }
}