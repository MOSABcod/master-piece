<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ClassesTableSeeder::class,
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            MediaTableSeeder::class, // Should be run before Questions and QuestionOptions if they require media
            ExamsTableSeeder::class,
            QuestionsTableSeeder::class,
            QuestionOptionsTableSeeder::class,
            AnswersTableSeeder::class,
            ResultsTableSeeder::class,
            EnrollmentsTableSeeder::class, // Typically run after Users and Classes
        ]);
    }
}
