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
            // UsersTableSeeder::class,         // Seed users
            ClassesTableSeeder::class,      // Seed classes
            ArabicFirstSeeder::class,       // Seed Arabic content for first grade
            MathFirstKgSeeder::class,       // Seed Math content for first KG
            MathSecThirdSeeder::class,      // Seed Math content for second & third grades
            ScienceSeeder::class,           // Seed Science content
            SecAndThirdSeeder::class,       // Seed second and third grade data
        ]);
    }
}
