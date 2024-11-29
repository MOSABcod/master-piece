<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Result;
use App\Models\User;
use App\Models\Exam;
use App\Models\CategoryResult;

class ResultsTableSeeder extends Seeder
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
            $class = $student->class; // Corrected to use the singular relationship
            if (!$class) {
                continue; // Skip this student if no class is associated
            }

            // Get exams assigned to the student's class
            $exams = $class->exams;

            foreach ($exams as $exam) {
                // Calculate total score based on correct answers
                $totalQuestions = $exam->questions()->count();
                $correctAnswers = 0;

                foreach ($exam->questions as $question) {
                    if ($question->answer_type === 0) { // Radio
                        $answer = $student->answers()->where('question_id', $question->id)->first();
                        if ($answer && $answer->selectedOption && $answer->selectedOption->is_correct) {
                            $correctAnswers++;
                        }
                    }
                    // For 'Input' type, implement custom scoring if needed
                }

                $totalScore = $totalQuestions > 0 ? ($correctAnswers / $totalQuestions) * 100 : 0;

                // Create Result
                $result = Result::create([
                    'user_id'    => $student->id,
                    'exam_id'    => $exam->id,
                    'total_score'=> round($totalScore, 2),
                    'date_taken' => now()->toDateString(),
                ]);

                // Calculate category scores
                $categories = $exam->questions->groupBy('category_id');

                foreach ($categories as $categoryId => $questions) {
                    $categoryQuestions = $questions->count();
                    $categoryCorrect = 0;

                    foreach ($questions as $question) {
                        if ($question->answer_type === 0) { // Radio
                            $answer = $student->answers()->where('question_id', $question->id)->first();
                            if ($answer && $answer->selectedOption && $answer->selectedOption->is_correct) {
                                $categoryCorrect++;
                            }
                        }
                        // For 'Input' type, implement custom scoring if needed
                    }

                    $categoryScore = $categoryQuestions > 0 ? ($categoryCorrect / $categoryQuestions) * 100 : 0;

                    // Create CategoryResult
                    CategoryResult::create([
                        'result_id'       => $result->id,
                        'category_id'     => $categoryId,
                        'category_score'  => round($categoryScore, 2),
                    ]);
                }
            }
        }
    }
}