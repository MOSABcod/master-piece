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
        Classes::create(['name' => 'روضة']);
        Classes::create(['name' => 'الصف الأول']);
        Classes::create(['name' => 'الصف الثاني']);
        Classes::create(['name' => 'الصف الثالث']);
    }
}
