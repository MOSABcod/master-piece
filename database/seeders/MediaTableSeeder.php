<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medium;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 20 media records (both images and voice recordings)
        Medium::factory()->count(20)->create();
    }
}