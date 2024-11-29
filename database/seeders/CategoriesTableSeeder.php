<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['category_name' => 'الرياضيات'],       // Mathematics
            ['category_name' => 'العلوم'],          // Science
            ['category_name' => 'التاريخ'],          // History
            ['category_name' => 'الجغرافيا'],        // Geography
            ['category_name' => 'اللغة العربية'],    // Arabic Language
            ['category_name' => 'اللغة الإنجليزية'], // English Language
            // Add more categories as needed
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}