<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MathFirstKgSeeder extends Seeder
{
    public function run()
    {
        DB::table('math_first_kg')->insert([
            [
                'question' => 'اختر العدد (اثنان)',
                'correct_answer' => '2'
            ],
            [
                'question' => 'اختر العدد (سبعة)',
                'correct_answer' => '7'
            ],
            [
                'question' => 'بداية أحمد 4 قطع شوكولاتة، إذا قُسمت كل قطعة إلى نصفين، كم قطعة شوكولاتة سيتناول كل منهما؟',
                'correct_answer' => '8'
            ],
            [
                'question' => 'اشترى سالم 5 بالونات، إذا طار منها بالونان، كم بالونًا بقي معه؟',
                'correct_answer' => '3'
            ],
            [
                'question' => 'ما هو العدد الأكبر؟',
                'correct_answer' => '9'
            ],
            [
                'question' => 'اختر المجموعة الأكثر',
                'correct_answer' => 'group2'
            ],
            [
                'question' => 'اختر المجموعة الأقل',
                'correct_answer' => 'group1'
            ],
            [
                'question' => 'اختر المجموعة الأقل',
                'correct_answer' => 'group2'
            ],
            [
                'question' => 'اختر العدد الأكبر؟',
                'correct_answer' => '9'
            ],
            [
                'question' => 'اختر العدد الأصغر؟',
                'correct_answer' => '4'
            ],
            [
                'question' => 'مع محمد 9 تفاحات (🍎)، أراد أن يضع كل 3 تفاحات (🍎) في كيس، كم كيسًا يحتاج؟',
                'correct_answer' => '3'
            ],
            [
                'question' => 'اشترى محمد 4 دفاتر (📕) وأعطاه عمه 6 دفاتر (📕) أخرى، كم دفترًا أصبح مع محمد؟',
                'correct_answer' => '10'
            ],
            [
                'question' => 'ما عدد النجوم (⭐)؟ ضع دائرة حول العدد المناسب.',
                'correct_answer' => '21'
            ],
            [
                'question' => 'اكتب في المربع ما يتبقى عندما تأخذ 4 من 9.',
                'correct_answer' => '5'
            ],
            [
                'question' => 'اكتب العدد الذي إذا أضفنا له 2 يصبح لدينا 5.',
                'correct_answer' => '3'
            ],
            [
                'question' => 'اكتب العدد الذي إذا طرحناه من 8 يصبح لدينا 6.',
                'correct_answer' => '2'
            ],
            [
                'question' => 'اكتب الناتج عند إضافة 2 إلى 7.',
                'correct_answer' => '9'
            ],
            [
                'question' => 'اكتب العدد الذي إذا أضفناه إلى 16 يصبح الناتج 20.',
                'correct_answer' => '4'
            ]
        ]);
    }
}
