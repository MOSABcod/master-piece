<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;
use App\Models\User;
use App\Models\Classes;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all teachers
        $teachers = User::where('role', 1)->get();

        // Get all classes
        $classes = Classes::all();

        foreach ($teachers as $teacher) {
            // Each teacher creates 2 exams
            Exam::factory()->count(2)->create([
                'creator_user_id' => $teacher->id,
                'date_created'    => now()->subDays(rand(1, 30)),
            ])->each(function ($exam) use ($classes) {
                // Assign each exam to 1-3 random classes
                $assignedClasses = $classes->random(rand(1, 3))->pluck('id')->toArray();
                $exam->classes()->attach($assignedClasses);
            });
        }
    }
}