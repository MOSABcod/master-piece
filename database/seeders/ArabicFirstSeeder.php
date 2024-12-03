<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArabicFirstSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'question' => 'حدد موقع المقطع الصوتي (عُ) في كلمة (شارعُ)',
                'correct_answer' => 'آخر'
            ],
            [
                'question' => 'حدد موقع المقطع الصوتي (جَ) في كلمة (جَبَلُ)',
                'correct_answer' => 'أول'
            ],
            [
                'question' => 'حدد موقع المقطع الصوتي (ط) في كلمة (مَطَر)',
                'correct_answer' => 'وسط'
            ],
            [
                'question' => 'ضع دائرة حول الصورة المناسبة عند تركيب المقاطع الصوتية (جَـ مَـ ل)',
                'correct_answer' => 'camel'
            ],
            [
                'question' => 'ضع دائرة حول الصورة المناسبة عند حذف المقطع الصوتي الأول من كلمة (مَـنار) لتصبح (نار)',
                'correct_answer' => 'fire'
            ],
            [
                'question' => 'كم مقطعًا صوتيًا نسمع عند تحليل كلمة (عَلَمُ)',
                'correct_answer' => '3'
            ],
            [
                'question' => 'ضع دائرة حول الكلمة التي تتكون من المقاطع الآتية (جَ رَ سْ)',
                'correct_answer' => 'جرس'
            ],
            [
                'question' => 'ضع دائرة حول التحليل الصحيح لكلمة (مَـجْـلِـسُ)',
                'correct_answer' => 'مَـ، جْـ، لِـسُ'
            ],
            [
                'question' => 'ضع دائرة حول كلمة (صِفْرُ)',
                'correct_answer' => 'صِفْرُ'
            ],
            [
                'question' => 'ضع دائرة حول كلمة (زَيْدٍ)',
                'correct_answer' => 'زَيْدٍ'
            ],
            [
                'question' => 'ضع دائرة حول الكلمة التي تبدأ باللام القمرية (التي تُنطق) من الكلمات الآتية',
                'correct_answer' => 'الْبَيْتُ'
            ],
            [
                'question' => 'ضع دائرة حول كلمة (دَرَّسَ)',
                'correct_answer' => 'دَرَّسَ'
            ]
        ];

        DB::table('arabic_first_kg')->insert($questions);
    }
}
