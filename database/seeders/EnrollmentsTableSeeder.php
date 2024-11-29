<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;
use App\Models\User;

class EnrollmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all students
        $students = User::where('role', 0)->get();

        foreach ($students as $student) {
            Enrollment::create([
                'class_id' => $student->class_id,
                'user_id'  => $student->id,
            ]);
        }
    }
}