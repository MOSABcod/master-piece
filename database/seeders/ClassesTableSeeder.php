<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classes;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert only the 4 specified classes
        Classes::create(['class_name' => 'روضة']);
        Classes::create(['class_name' => 'الصف الأول']);
        Classes::create(['class_name' => 'الصف الثاني']);
        Classes::create(['class_name' => 'الصف الثالث']);
    }
}
