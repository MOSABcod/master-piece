<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Exam;
use App\Models\Category;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $exams = Exam::with('classes')->get();

        foreach ($exams as $exam) {
            // Create 5 questions per exam
            Question::factory()->count(5)->create([
                'exam_id' => $exam->id,
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
        }
    }
}