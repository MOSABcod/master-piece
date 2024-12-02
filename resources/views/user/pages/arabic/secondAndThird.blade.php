@extends('user.layout.mainlayout')

@section('content')
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worksheet</title>
    <style>
        .radio-group {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    padding: 10px;
    border: 1px solid #d1d5db;
    border-radius: 10px;
    background-color: #f8f9fa;
}

.radio-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.2rem;
    color: #374151;
    cursor: pointer;
}

.radio-item input[type="radio"] {
    accent-color: #3b82f6;
    margin: 0;
    width: 18px;
    height: 18px;
}

.stars {
    font-size: 1.5rem;
    color: #ffcc00;
}

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }

        .container {
            width: 100%;
            max-width: 700px;
            background-color: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position: relative;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: #374151;
            margin-bottom: 40px;
        }

        .question {
            margin-bottom: 25px;
            padding: 20px;
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            display: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }

        .question.active {
            display: block;
            transform: scale(1.02);
        }

        .question label {
            display: block;
            margin-bottom: 15px;
            font-size: 1.4rem;
            font-weight: bold;
            color: #1f2937;
        }

        .question p {
            font-size: 1.1rem;
            margin-bottom: 15px;
            color: #6b7280;
        }

        .answer {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .answer:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .radio-group input[type="radio"] {
            margin-right: 8px;
            accent-color: #3b82f6;
        }

        .radio-group label {
            font-size: 1.1rem;
            color: #4b5563;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            padding: 12px 20px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .prev {
            background-color: #d1d5db;
            color: #374151;
        }

        .prev:hover {
            background-color: #9ca3af;
        }

        .next {
            background-color: #3b82f6;
            color: white;
        }

        .next:hover {
            background-color: #2563eb;
        }

        button:disabled {
            background-color: #e5e7eb;
            color: #9ca3af;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <h1>ورقة عمل</h1>

            <div class="question active">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    عند حذف المقطع الصوتي الأول من كلمة (<span style="font-weight: bold;">سعيد</span>) تنتج كلمة جديدة ذات معنى هي:
                </label>
                <div class="radio-group flex justify-around items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <!-- First Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option1" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">بَعيدُ</span>
                    </label>
                    <!-- Second Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option2" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">عَنيدُ</span>
                    </label>
                    <!-- Third Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option2" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">عيدُ</span>
                    </label>
                    <!-- Third Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option3" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">عَديدُ</span>
                    </label>
                </div>
            </div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع المقطع الصوتي (لَ) بدلاً من المقطع الصوتي (جَ) في كلمة (جَمَع) لتكون كلمة جديدة ذات معنى:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="replace-syllable" value="سَمَعَ">
            <span>سَمَعَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="replace-syllable" value="لَمَعَ">
            <span>لَمَعَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="replace-syllable" value="قَمَعَ">
            <span>قَمَعَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="replace-syllable" value="وَضَعَ">
            <span>وَضَعَ</span>
        </label>
    </div>
</div>

<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة التي تحتوي مداً بالياء، ما يأتي:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-with-madd" value="مَحْمُودٌ">
            <span>مَحْمُودٌ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-with-madd" value="عِمَادٌ">
            <span>عِمَادٌ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-with-madd" value="جَمِيلٌ">
            <span>جَمِيلٌ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-with-madd" value="كِتَابٌ">
            <span>كِتَابٌ</span>
        </label>
    </div>
</div>


<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (<span style="font-size: 1.2em; font-weight: bold;">عَلَََمَ</span>).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="choose-word" value="عَلِمْ">
            <span>عَلِمْ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="choose-word" value="عَلَََمَ">
            <span>عَلَََمَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="choose-word" value="عِلْمُ">
            <span>عِلْمُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="choose-word" value="عَلَمُ">
            <span>عَلَمُ</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة التي تبدأ باللام الشمسية في الجملة الآتية:
    </label>
    <p class="mb-2 text-gray-600 text-lg">العنب فاكهتي المُفضَّلة في فصل الصيف.</p>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="shamsi-lam" value="العنب">
            <span>العنب</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="shamsi-lam" value="فاكهتي">
            <span>فاكهتي</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="shamsi-lam" value="المُفضَّلة">
            <span>المُفضَّلة</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="shamsi-lam" value="في">
            <span>في</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="shamsi-lam" value="فصل">
            <span>فصل</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="shamsi-lam" value="الصيف">
            <span>الصيف</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (لَبَن).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="لَبْنَا">
            <span>لَبْنَا</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="لَبَنُ">
            <span>لَبَنُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="لَبَنٍ">
            <span>لَبَنٍ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="لَبَنْ">
            <span>لَبَنْ</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (سَحَبَ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="سَحَبَ">
            <span>سَحَبَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="سَحْبُ">
            <span>سَحْبُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="سَحْبٍ">
            <span>سَحْبٍ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="word-selection" value="سَحَابَةُ">
            <span>سَحَابَةُ</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (عَمِلَتْ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="worked-word" value="عملت">
            <span>عَمِلَتْ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="worked-word" value="عملة">
            <span>عُمْلَة</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="worked-word" value="عملة-with-shadda">
            <span>عَمَّلَة</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="worked-word" value="عمل">
            <span>عَمَل</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول التحليل الصحيح لكلمة (<span style="font-size: 1.2em; font-weight: bold;">اِسْتَنْشَقَ</span>).
    </label>
    <div class="radio-group flex flex-col gap-4 border border-gray-300 p-4 rounded-md bg-gray-100" style="direction: rtl; text-align: right;">
        <!-- First Option -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="analysis" value="option1" class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اِسْ &nbsp; تَـ &nbsp; نْـ &nbsp; شَـ &nbsp; قَ
            </span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="analysis" value="option2" class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اِ&nbsp; سْـ &nbsp; &nbsp;نَـتَـ  &nbsp; شَـقْ
            </span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="analysis" value="option3" class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اِسْـ &nbsp; تَـ &nbsp; شَـنْـ  &nbsp; قْ
            </span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="analysis" value="option4" class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اِسْـتَـ&nbsp;  &nbsp; نْـ &nbsp; شَـ &nbsp; قَ
            </span>
        </label>
    </div>
</div>

<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold; "><span style="text-decoration: underline;">الْتَهَمَ</span> الأَسَدُ اللَّحْمَ</span>.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="رَمى" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">رَمى</span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="شَرِبَ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">شَرِبَ</span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="أَكَلَ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَكَلَ</span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="تَرَكَ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">تَرَكَ</span>
        </label>
    </div>
</div>

<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold;"><span style="text-decoration: underline;">عَبَرَ</span> مُحَمَّدُ الشَّارِعَ</span>.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="أَخَذَ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَخَذَ</span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="قَطَعَ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">قَطَعَ</span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="سَارَ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">سَارَ</span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="أَحَبَّ" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَحَبَّ</span>
        </label>
    </div>
</div>

<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold;"> غَيَّرَتْ<span style="text-decoration: underline;"> عَجَلَةَ </span>الدَّرَّاجَةِ.</span>
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="مَفْقُود" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">مَفْقُود</span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="إِطَار" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">إِطَار</span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="كُرْسِي" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">كُرْسِي</span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="سُرْعَة" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">سُرْعَة</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold;"> كُنْتُ في<span style="text-decoration: underline;"> عَجَلَةٍ </span>مِنْ أَمْرِي.</span>
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="ضَعْف" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">ضَعْف</span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="بُطْء" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">بُطْء</span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="إِطَار" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">إِطَار</span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="meaning" value="سُرْعَة" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">سُرْعَة</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة المختلفة.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="different-word" value="مَزْرَعَة" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">مَزْرَعَة</span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="different-word" value="مَزَارِع" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">مَزَارِع</span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="different-word" value="ثِمَار" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">ثِمَار</span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="different-word" value="زِرَاعَة" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">زِرَاعَة</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        اختر ثلاث كلمات مرتبطة بكلمة (رَمَضَان).
    </label>
    <div class="radio-group grid grid-cols-4 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Row -->
        <div class="grid grid-cols-4 gap-4">
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="صِيَام" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">صِيَام</span>
            </label>
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="زَكَاة" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">زَكَاة</span>
            </label>
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="نَظَّارَات" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">نَظَّارَات</span>
            </label>
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="هِلَال" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">هِلَال</span>
            </label>
        </div>

        <!-- Second Row -->
        <div class="grid grid-cols-4 gap-4">
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="فُطُور" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">فُطُور</span>
            </label>
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="حَاسُوب" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">حَاسُوب</span>
            </label>
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="أَنْف" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">أَنْف</span>
            </label>
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="checkbox" name="related-words" value="رَأْس" class="form-checkbox w-5 h-5 mb-2">
                <span class="text-gray-700">رَأْس</span>
            </label>
        </div>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        أكمل الجملة الآتية بوصف مناسب: تناولت فطورًا _______ في الصباح.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- First Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="description" value="لَذِيذًا" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">لَذِيذًا</span>
        </label>

        <!-- Second Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="description" value="بَعِيدًا" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">بَعِيدًا</span>
        </label>

        <!-- Third Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="description" value="عَالِيًا" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">عَالِيًا</span>
        </label>

        <!-- Fourth Option -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="description" value="نَحِيفًا" class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">نَحِيفًا</span>
        </label>
    </div>
</div>
<div class="question">
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ماذا أقول لمن عاد من السَّفر؟ (<span style="text-decoration: underline;">____________</span>)
    </label>
    <textarea class="answer w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              placeholder="اكتب إجابتك هنا..."></textarea>
</div>


    <!-- Questions Section -->
    <div class="questions">
        <!-- Question 1 -->
        <div class="question mb-4">
                <!-- Paragraph Section -->
    <div class="paragraph mb-4">
        <label class="mb-2 block text-lg font-semibold text-gray-700">
            أقرا وحدك الفقرة الاتية للإجابة عن الاسئلة التي تليها:
            <p>
            قرأتُ قصةً مع عائلتي عن شجرةِ الكتب. الشجرةُ في غابة، وأوراقُ الشجرةِ ليستْ خضراءَ،
            بل هي كُتُبٌ صغيرةٌ، وكلُّ ورقةٍ تمثّلُ كتابًا. وأجملُ قصةٍ في الغابة كانت عن صناعة القوارب.
            </p>
        </label>
        <p class="text-lg text-gray-700 font-semibold leading-relaxed">
        </p>
    </div>

            <label class="mb-2 block text-lg  text-gray-700">
                ضع إشارةً على المستطيل رقم "١" 🖋:
                ما هي القصةُ الأجملُ التي تَمثّلها الشجرةُ؟
            </label>
            <div class="radio-group flex flex-col gap-2">
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question1" value="القصص" class="form-radio w-5 h-5">
                    <span class="text-gray-700">القصصُ عن صناعة القوارب</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question1" value="الأوراق" class="form-radio w-5 h-5">
                    <span class="text-gray-700">الأوراقُ الخضراءُ للأشجار</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question1" value="الأشجار" class="form-radio w-5 h-5">
                    <span class="text-gray-700">الأشجارُ في الغابة</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question1" value="العائلة" class="form-radio w-5 h-5">
                    <span class="text-gray-700">القصةُ عن عائلةٍ تقرأ الكُتُبَ</span>
                </label>
            </div>
        </div>

        <!-- Question 2 -->
        <div class="question mb-4">
            <div class="paragraph mb-4">
                <label class="mb-2 block text-lg font-semibold text-gray-700">
                    أقرا وحدك الفقرة الاتية للإجابة عن الاسئلة التي تليها:
                    <p>
                    قرأتُ قصةً مع عائلتي عن شجرةِ الكتب. الشجرةُ في غابة، وأوراقُ الشجرةِ ليستْ خضراءَ،
                    بل هي كُتُبٌ صغيرةٌ، وكلُّ ورقةٍ تمثّلُ كتابًا. وأجملُ قصةٍ في الغابة كانت عن صناعة القوارب.
                    </p>
                </label>
                <p class="text-lg text-gray-700 font-semibold leading-relaxed">
                </p>
            </div>
            <label class="mb-2 block text-lg font-semibold text-gray-700">
                ضع إشارةً على المستطيل رقم "٢" 🖋:
                ماذا تمثّلُ الأوراقُ في الشجرة؟
            </label>
            <div class="radio-group flex flex-col gap-2">
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question2" value="كتب" class="form-radio w-5 h-5">
                    <span class="text-gray-700">كُتُبٌ صغيرةٌ</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question2" value="أشجار" class="form-radio w-5 h-5">
                    <span class="text-gray-700">أشجارٌ في الغابة</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question2" value="أوراق" class="form-radio w-5 h-5">
                    <span class="text-gray-700">أوراقٌ خضراء</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question2" value="قصة" class="form-radio w-5 h-5">
                    <span class="text-gray-700">قصةٌ عن القوارب</span>
                </label>
            </div>
        </div>

        <!-- Question 3 -->
        <div class="question">
            <div class="paragraph mb-4">
                <label class="mb-2 block text-lg font-semibold text-gray-700">
                    أقرا وحدك الفقرة الاتية للإجابة عن الاسئلة التي تليها:
                    <p>
                    قرأتُ قصةً مع عائلتي عن شجرةِ الكتب. الشجرةُ في غابة، وأوراقُ الشجرةِ ليستْ خضراءَ،
                    بل هي كُتُبٌ صغيرةٌ، وكلُّ ورقةٍ تمثّلُ كتابًا. وأجملُ قصةٍ في الغابة كانت عن صناعة القوارب.
                    </p>
                </label>
                <p class="text-lg text-gray-700 font-semibold leading-relaxed">
                </p>
            </div>
            <label class="mb-2 block text-lg font-semibold text-gray-700">
                ضع إشارةً على المستطيل رقم "٣" 🖋:
                اذكر كلمةً تعبرُ عن شجرةِ الكُتُبِ.
            </label>
            <div class="radio-group flex flex-col gap-2">
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question3" value="تقرأ" class="form-radio w-5 h-5">
                    <span class="text-gray-700">تقرأُ القوارب</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question3" value="تصنع" class="form-radio w-5 h-5">
                    <span class="text-gray-700">تصنعُ القوارب</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question3" value="تزرع" class="form-radio w-5 h-5">
                    <span class="text-gray-700">تزرعُ الأشجار</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question3" value="تغني" class="form-radio w-5 h-5">
                    <span class="text-gray-700">تغني في الغابة</span>
                </label>
            </div>
        </div>
    </div>




            <!-- Navigation Buttons -->
            <div class="navigation-buttons">
                <button id="prev" class="prev" disabled>السابق</button>
                <button id="next" class="next">التالي</button>
            </div>
        </div>
    </div>

    <script>
        const questions = document.querySelectorAll('.question');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        let currentStep = 0;

        function updateQuestions() {
            questions.forEach((question, index) => {
                question.classList.toggle('active', index === currentStep);
            });

            prevButton.disabled = currentStep === 0;
            nextButton.disabled = currentStep === questions.length - 1;
        }

        prevButton.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                updateQuestions();
            }
        });

        nextButton.addEventListener('click', () => {
            if (currentStep < questions.length - 1) {
                currentStep++;
                updateQuestions();
            }
        });

        updateQuestions();
    </script>
</body>

</html>
@endsection
