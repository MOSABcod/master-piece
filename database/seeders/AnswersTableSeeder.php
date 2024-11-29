<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\User;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Medium;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all students
        $students = User::where('role', 0)->get();

        foreach ($students as $student) {
            // Ensure the student is associated with a class
            $class = $student->class;
            if (!$class) {
                continue; // Skip this student if no class is associated
            }

            // Get exams assigned to the student's class
            $exams = $class->exams;

            foreach ($exams as $exam) {
                // Get all questions for the exam
                $questions = $exam->questions;

                foreach ($questions as $question) {
                    // Create an answer based on the question type
                    if ($question->answer_type === 0) { // Radio
                        // Select a random option (could be correct or incorrect)
                        $selectedOption = $question->questionOptions->random();

                        Answer::create([
                            'user_id'            => $student->id,
                            'question_id'        => $question->id,
                            'selected_option_id' => $selectedOption->id,
                            'answer_text'        => null,
                            'answer_voice_id'    => null,
                            'date_submitted'     => now(),
                        ]);
                    } else { // Input
                        // Optionally, attach a voice recording
                        $hasVoice = rand(0, 1) ? true : false;
                        $voiceId = $hasVoice ? Medium::factory()->create(['media_type' => 'Voice'])->id : null;

                        Answer::create([
                            'user_id'            => $student->id,
                            'question_id'        => $question->id,
                            'answer_text'        => 'هذا إجابة تجريبية.', // "This is a sample answer."
                            'selected_option_id' => null,
                            'answer_voice_id'    => $voiceId,
                            'date_submitted'     => now(),
                        ]);
                    }
                }
            }
        }
    }
}