<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Classes;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ensure there are classes available
        if (Classes::count() === 0) {
            $this->call(ClassesTableSeeder::class);
        }

        // Create 5 teachers linked to random classes
        User::factory()->count(5)->create([
            'role'     => 1, // Teacher
            'age'      => null,
            'class_id' => Classes::inRandomOrder()->first()->id,
        ]);

        // Create 50 students linked to random classes
        User::factory()->count(50)->create([
            'role'     => 0, // Student
            'age'      => function () {
                return rand(6, 18);
            },
            'class_id' => function () {
                return Classes::inRandomOrder()->first()->id;
            },
        ]);
    }
}