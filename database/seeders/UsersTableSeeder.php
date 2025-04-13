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
        // التأكد من وجود بيانات في جدول الفصول
        if (Classes::count() === 0) {
            $this->call(ClassesTableSeeder::class);
        }

        // إنشاء 5 معلمين بدون فصول
        User::factory()->count(5)->create([
            'role'     => 1, // Teacher
            'age'      => null,
            'class_id' => null,
        ]);

        // إنشاء 50 طالب مرتبطين بفصول عشوائية
        User::factory()->count(50)->create([
            'role'     => 0, // Student
            'age'      => function () {
                return rand(6, 18);
            },
            'class_id' => function () {
                return Classes::inRandomOrder()->first()->id ?? Classes::factory()->create()->id;
            },
        ]);
    }
}
