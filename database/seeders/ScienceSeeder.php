<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScienceSeeder extends Seeder
{
    public function run()
    {
        DB::table('science')->insert([
            [
                'question' => 'كوكب الأرض الوحيد الذي يوجد عليه حياة بسبب:',
                'correct_answer' => 'جميع ما سبق'
            ],
            [
                'question' => 'تدور الأرض حول نفسها كل ساعة:',
                'correct_answer' => '24'
            ],
            [
                'question' => 'مكونات النظام البيئي:',
                'correct_answer' => 'الماء، الهواء، و التربة و الصخور'
            ],
            [
                'question' => 'ما هو الإهتزاز الذي يحدث لصخور الأرض:',
                'correct_answer' => 'الزلزال'
            ],
            [
                'question' => 'الطاقة الشمسية و الرياح:',
                'correct_answer' => 'موارد طاقة متجددة'
            ],
            [
                'question' => 'يحفر الناس حفر عميقة للوصول إلى ..................... تسمى الآبار:',
                'correct_answer' => 'المياه الجوفية'
            ],
            [
                'question' => 'مصدر المياه المالحة على كوكب الأرض هو:',
                'correct_answer' => 'البحيرات'
            ],
            [
                'question' => 'تستخدم الأحافير لـ؟',
                'correct_answer' => 'جميع ما ذكر'
            ],
            [
                'question' => 'النفط والفحم الحجري يعدان من؟',
                'correct_answer' => 'الوقود الأحفوري'
            ],
            [
                'question' => 'هي معالم طبيعية لسطح الأرض:',
                'correct_answer' => 'التضاريس'
            ],
            [
                'question' => 'يعتبر المرجان مثالا للكائنات الحية:',
                'correct_answer' => 'صواب'
            ],

        ]);
    }
}
// [
//     'question' => 'عند حذف المقطع الصوتي الأول من كلمة (سعيد) تنتج كلمة جديدة ذات معنى هي:',
//     'correct_answer' => 'عيد'
// ]
