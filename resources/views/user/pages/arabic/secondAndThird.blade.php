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
        .navigation-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.left-buttons {
    display: flex;
    gap: 10px; /* Space between the button and the link */
}

button, a {
    /* padding: 12px 20px; */
    font-size: 1rem;
    font-weight: bold;
    border: none;
    border-radius: 8px;
    text-decoration: none; /* Ensure the link looks like a button */
    text-align: center;
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
.exit-link {
    background-color: #ef4444; /* Red background */
    color: white; /* White text */
    text-decoration: none; /* Remove underline */
    padding: 12px 20px; /* Button-like padding */
    font-size: 1rem;
    font-weight: bold;
    border-radius: 8px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.exit-link:hover {
    background-color: #dc2626; /* Darker red for hover effect */
}
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div id="timer" class="timer">15:00</div>

            <h1>ورقة عمل</h1>
            <form id="questions-form" method="POST" action="{{ route('save.ar.sec') }}">
                @csrf
<!-- Hidden input to store the remaining time -->
<input type="hidden" name="timer" id="arSecTimer" > <!-- 15 minutes in seconds -->
<!-- Timer Input -->
<input type="hidden" name="timer" >

<!-- السؤال الأول -->
<div class="question active">
    <p>السؤال الأول</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        عند حذف المقطع الصوتي الأول من كلمة (<span style="font-weight: bold;">سعيد</span>) تنتج كلمة جديدة ذات معنى هي:
    </label>
    <div class="radio-group flex justify-around items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[1]" value="بَعيدُ" {{ old('answers.1') == 'بَعيدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span style="font-size: 1.2em; font-weight: bold;">بَعيدُ</span>
        </label>
        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[1]" value="عَنيدُ" {{ old('answers.1') == 'عَنيدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span style="font-size: 1.2em; font-weight: bold;">عَنيدُ</span>
        </label>
        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[1]" value="عيدُ" {{ old('answers.1') == 'عيدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span style="font-size: 1.2em; font-weight: bold;">عيدُ</span>
        </label>
        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[1]" value="عَديدُ" {{ old('answers.1') == 'عَديدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span style="font-size: 1.2em; font-weight: bold;">عَديدُ</span>
        </label>
    </div>
</div>

<!-- السؤال الثاني -->
<div class="question">
    <p>السؤال الثاني</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع المقطع الصوتي (لَ) بدلاً من المقطع الصوتي (جَ) في كلمة (جَمَع) لتكون كلمة جديدة ذات معنى:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[2]" value="سَمِعَ" {{ old('answers.2') == 'سَمِعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>سَمِعَ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[2]" value="لَمَعَ" {{ old('answers.2') == 'لَمَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>لَمَعَ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[2]" value="قَمَعَ" {{ old('answers.2') == 'قَمَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>قَمَعَ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[2]" value="وَضَعَ" {{ old('answers.2') == 'وَضَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>وَضَعَ</span>
        </label>
    </div>
</div>

<!-- السؤال الثالث -->
<div class="question">
    <p>السؤال الثالث</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة التي تحتوي مداً بالياء، ما يأتي:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[3]" value="مَحْمُودٌ" {{ old('answers.3') == 'مَحْمُودٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>مَحْمُودٌ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[3]" value="عِمَادٌ" {{ old('answers.3') == 'عِمَادٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عِمَادٌ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[3]" value="جَمِيلٌ" {{ old('answers.3') == 'جَمِيلٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>جَمِيلٌ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[3]" value="كِتَابٌ" {{ old('answers.3') == 'كِتَابٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>كِتَابٌ</span>
        </label>
    </div>
</div>

<!-- السؤال الرابع -->
<div class="question">
    <p>السؤال الرابع</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (<span style="font-size: 1.2em; font-weight: bold;">عَلَّمَ </span>).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[4]" value="عَلِمْ" {{ old('answers.4') == 'عَلِمْ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عَلِمْ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[4]" value="عَلَّمَ" {{ old('answers.4') == 'عَلَّمَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عَلَّمَ </span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[4]" value="عِلْمُ" {{ old('answers.4') == 'عِلْمُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عِلْمُ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[4]" value="عَلَمُ" {{ old('answers.4') == 'عَلَمُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عَلَمُ</span>
        </label>
    </div>
</div>

<!-- السؤال الخامس -->
<div class="question">
    <p>السؤال الخامس</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة التي تبدأ باللام الشمسية في الجملة الآتية:
    </label>
    <p class="mb-2 text-gray-600 text-lg">العنب فاكهتي المُفضَّلة في فصل الصيف.</p>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="العنب" {{ old('answers.5') == 'العنب' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>العنب</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="فاكهتي" {{ old('answers.5') == 'فاكهتي' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>فاكهتي</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="المُفضَّلة" {{ old('answers.5') == 'المُفضَّلة' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>المُفضَّلة</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="في" {{ old('answers.5') == 'في' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>في</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="فصل" {{ old('answers.5') == 'فصل' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>فصل</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="الصيف" {{ old('answers.5') == 'الصيف' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>الصيف</span>
        </label>
    </div>
</div>

<!-- السؤال السادس -->
<div class="question">
    <p>السؤال السادس</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (لَبَنٌ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[6]" value="لَبْنَا" {{ old('answers.6') == 'لَبْنَا' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>لَبْنَا</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[6]" value="لَبَنُ" {{ old('answers.6') == 'لَبَنُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>لَبَنُ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[6]" value="لَبَنٍ" {{ old('answers.6') == 'لَبَنٍ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>لَبَنٍ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[6]" value="لَبَنٌ" {{ old('answers.6') == 'لَبَنٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>لَبَنٌ</span>
        </label>
    </div>
</div>

<!-- السؤال السابع -->
<div class="question">
    <p>السؤال السابع</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (سُحُبُ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[7]" value="سَحَبَ" {{ old('answers.7') == 'سَحَبَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>سَحَبَ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[7]" value="سُحُبُ" {{ old('answers.7') == 'سُحُبُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>سُحُبُ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[7]" value="سَحْبٍ" {{ old('answers.7') == 'سَحْبٍ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>سَحْبٍ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[7]" value="سَحَابَةُ" {{ old('answers.7') == 'سَحَابَةُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>سَحَابَةُ</span>
        </label>
    </div>
</div>

<!-- السؤال الثامن -->
<div class="question">
    <p>السؤال الثامن</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (عَمِلَتُ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[8]" value="عَمِلَتُ" {{ old('answers.8') == 'عَمِلَتُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عَمِلَتُ</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[8]" value="عُمْلَة" {{ old('answers.8') == 'عُمْلَة' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عُمْلَة</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[8]" value="عَمَّلَة" {{ old('answers.8') == 'عَمَّلَة' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عَمَّلَة</span>
        </label>
        <label class="radio-item flex items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[8]" value="عَمَل" {{ old('answers.8') == 'عَمَل' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span>عَمَل</span>
        </label>
    </div>
</div>

<!-- السؤال التاسع -->
<div class="question">
    <p>السؤال التاسع</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول التحليل الصحيح لكلمة (<span style="font-size: 1.2em; font-weight: bold;">اِسْتَنْشَقَ</span>).
    </label>
    <div class="radio-group flex flex-col gap-4 border border-gray-300 p-4 rounded-md bg-gray-100" style="direction: rtl; text-align: right;">
        <!-- الخيار الأول -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="answers[9]" value="  اسْ &nbsp; تَـ &nbsp; نْـ &nbsp; شَـ &nbsp; قَ" {{ old('answers.9') == '  اسْ &nbsp; تَـ &nbsp; نْـ &nbsp; شَـ &nbsp; قَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اسْ &nbsp; تَـ &nbsp; نْـ &nbsp; شَـ &nbsp; قَ
            </span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="answers[9]" value="ا&nbsp; سْـ &nbsp; &nbsp;تَـنَـ  &nbsp; شَـقْ" {{ old('answers.9') == 'ا&nbsp; سْـ &nbsp; &nbsp;تَـنَـ  &nbsp; شَـقْ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span class="text-gray-700">
                ا&nbsp; سْـ &nbsp; &nbsp;تَـنَـ  &nbsp; شَـقْ
            </span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="answers[9]" value="اسْـ &nbsp; تَـ &nbsp; نْـشَـ  &nbsp; قْ" {{ old('answers.9') == 'اسْـ &nbsp; تَـ &nbsp; نْـشَـ  &nbsp; قْ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اسْـ &nbsp; تَـ &nbsp; نْـشَـ  &nbsp; قْ
            </span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex items-center cursor-pointer gap-2">
            <input type="radio" name="answers[9]" value="اسْـتَـ&nbsp;  &nbsp; نْـ &nbsp; شَـ &nbsp; قَ" {{ old('answers.9') == 'اسْـتَـ&nbsp;  &nbsp; نْـ &nbsp; شَـ &nbsp; قَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
            <span class="text-gray-700">
                اسْـتَـ&nbsp;  &nbsp; نْـ &nbsp; شَـ &nbsp; قَ
            </span>
        </label>
    </div>
</div>

<!-- السؤال العاشر -->
<div class="question">
    <p>السؤال العاشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold; "><span style="text-decoration: underline;">الْتَهَمَ</span> الأَسَدُ اللَّحْمَ</span>.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[10]" value="رَمى" {{ old('answers.10') == 'رَمى' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">رَمى</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[10]" value="شَرِبَ" {{ old('answers.10') == 'شَرِبَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">شَرِبَ</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[10]" value="أَكَلَ" {{ old('answers.10') == 'أَكَلَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَكَلَ</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[10]" value="تَرَكَ" {{ old('answers.10') == 'تَرَكَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">تَرَكَ</span>
        </label>
    </div>
</div>

<!-- السؤال الحادي عشر -->
<div class="question">
    <p>السؤال الحادي عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold;"><span style="text-decoration: underline;">عَبَرَ</span> مُحَمَّدُ الشَّارِعَ</span>.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[11]" value="أَخَذَ" {{ old('answers.11') == 'أَخَذَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَخَذَ</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[11]" value="قَطَعَ" {{ old('answers.11') == 'قَطَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">قَطَعَ</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[11]" value="سَارَ" {{ old('answers.11') == 'سَارَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">سَارَ</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[11]" value="أَحَبَّ" {{ old('answers.11') == 'أَحَبَّ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَحَبَّ</span>
        </label>
    </div>
</div>

<!-- السؤال الثاني عشر -->
<div class="question">
    <p>السؤال الثاني عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold;"> غَيَّرَتْ<span style="text-decoration: underline;"> عَجَلَةَ </span>الدَّرَّاجَةِ.</span>
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[12]" value="مَفْقُود" {{ old('answers.12') == 'مَفْقُود' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">مَفْقُود</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[12]" value="إِطَار" {{ old('answers.12') == 'إِطَار' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">إِطَار</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[12]" value="كُرْسِي" {{ old('answers.12') == 'كُرْسِي' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">كُرْسِي</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[12]" value="سُرْعَة" {{ old('answers.12') == 'سُرْعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">سُرْعَة</span>
        </label>
    </div>
</div>

<!-- السؤال الثالث عشر -->
<div class="question">
    <p>السؤال الثالث عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        حدد معنى الكلمة التي تحتها خط: <span style="font-weight: bold;"> كُنْتُ في<span style="text-decoration: underline;"> عَجَلَةٍ </span>مِنْ أَمْرِي.</span>
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[13]" value="ضَعْف" {{ old('answers.13') == 'ضَعْف' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">ضَعْف</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[13]" value="بُطْء" {{ old('answers.13') == 'بُطْء' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">بُطْء</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[13]" value="إِطَار" {{ old('answers.13') == 'إِطَار' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">إِطَار</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[13]" value="سُرْعَة" {{ old('answers.13') == 'سُرْعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">سُرْعَة</span>
        </label>
    </div>
</div>

<!-- السؤال الرابع عشر -->
<div class="question">
    <p>السؤال الرابع عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة المختلفة.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[14]" value="مَزْرَعَة" {{ old('answers.14') == 'مَزْرَعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">مَزْرَعَة</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[14]" value="مَزَارِع" {{ old('answers.14') == 'مَزَارِع' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">مَزَارِع</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[14]" value="ثِمَار" {{ old('answers.14') == 'ثِمَار' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">ثِمَار</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[14]" value="زِرَاعَة" {{ old('answers.14') == 'زِرَاعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">زِرَاعَة</span>
        </label>
    </div>
</div>
<!-- السؤال الخامس عشر -->
<div class="question">
    <p>السؤال الخامس عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        اختر  كلمة مرتبطة بكلمة (رَمَضَان).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[15]" value="فُطُور" {{ old('answers.14') == 'فُطُور' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">فُطُور</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[15]" value="حَاسُوب" {{ old('answers.14') == 'حَاسُوب' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">حَاسُوب</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[15]" value="أَنْف" {{ old('answers.14') == 'أَنْف' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">أَنْف</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[15]" value="رَأْس" {{ old('answers.14') == 'رَأْس' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">رَأْس</span>
        </label>
    </div>
</div>

<!-- السؤال السادس عشر -->
<div class="question">
    <p>السؤال السادس عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        أكمل الجملة الآتية بوصف مناسب: تناولت فطورًا _______ في الصباح.
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <!-- الخيار الأول -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[16]" value="لَذِيذًا" {{ old('answers.16') == 'لَذِيذًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">لَذِيذًا</span>
        </label>

        <!-- الخيار الثاني -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[16]" value="بَعِيدًا" {{ old('answers.16') == 'بَعِيدًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">بَعِيدًا</span>
        </label>

        <!-- الخيار الثالث -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[16]" value="عَالِيًا" {{ old('answers.16') == 'عَالِيًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">عَالِيًا</span>
        </label>

        <!-- الخيار الرابع -->
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[16]" value="نَحِيفًا" {{ old('answers.16') == 'نَحِيفًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
            <span class="text-gray-700">نَحِيفًا</span>
        </label>
    </div>
</div>
<!-- السؤال السابع عشر -->
<div class="question">
    <p>السؤال السابع عشر</p>
    <label>اكتب ما يملى عليك (نَجَحَتِ الْفَتاةُ)</label>
    <input type="text" name="answers[17]" class="answer" placeholder="أدخل الإجابة" value="{{ old('answers.17') }}">
</div>

<!-- السؤال الثامن عشر -->
<div class="question">
    <p>السؤال الثامن عشر</p>
    <label>اكتب ما يملى عليك (رَكِبَ مُحَمَّدٌ الدَّرّاجَةَ)</label>
    <input type="text" name="answers[18]" class="answer" placeholder="أدخل الإجابة" value="{{ old('answers.18') }}">
</div>

<!-- السؤال التاسع عشر -->
<div class="question">
    <p>السؤال التاسع عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ماذا أقول لمن عاد من السَّفر؟ (<span style="text-decoration: underline;">____________</span>)
    </label>
    <textarea name="answers[19]" class="answer w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
              placeholder="اكتب إجابتك هنا...">{{ old('answers.19') }}</textarea>
</div>
<!-- قسم الأسئلة المقروءة -->
<div class="questions">
    <!-- السؤال عشرين -->
    <div class="question mb-4">
        <p>السؤال عشرين </p>
        <!-- قسم الفقرة -->
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

        <label class="mb-2 block text-lg text-gray-700">
            ضع إشارةً على المستطيل رقم "١" 🖋:
            ما هي القصةُ الأجملُ التي تَمثّلها الشجرةُ؟
        </label>
        <div class="radio-group flex flex-col gap-2">
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[20]" value="القصص" {{ old('answers.20.1') == 'القصص' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">القصصُ عن صناعة القوارب</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[20]" value="الأوراق" {{ old('answers.20.1') == 'الأوراق' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">الأوراقُ الخضراءُ للأشجار</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[20]" value="الأشجار" {{ old('answers.20.1') == 'الأشجار' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">الأشجارُ في الغابة</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[20]" value="العائلة" {{ old('answers.20.1') == 'العائلة' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">القصةُ عن عائلةٍ تقرأ الكُتُبَ</span>
            </label>
        </div>
    </div>

    <!-- السؤال واحد وعشرين -->
    <div class="question mb-4">
        <p>السؤال واحد وعشرين</p>
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
                <input type="radio" name="answers[21]" value="كتب" {{ old('answers.21.2') == 'كتب' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">كُتُبٌ صغيرةٌ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[21]" value="أشجار" {{ old('answers.21.2') == 'أشجار' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">أشجارٌ في الغابة</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[21]" value="أوراق" {{ old('answers.21.2') == 'أوراق' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">أوراقٌ خضراء</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[21]" value="قصة" {{ old('answers.21.2') == 'قصة' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">قصةٌ عن القوارب</span>
            </label>
        </div>
    </div>

    <!-- السؤال ثاني وعشرين -->
    <div class="question">
        <p>السؤال ثاني وعشرين</p>
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
                <input type="radio" name="answers[22]" value="تقرأ" {{ old('answers.22.3') == 'تقرأ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">تقرأُ القوارب</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[22]" value="تصنع" {{ old('answers.22.3') == 'تصنع' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">تصنعُ القوارب</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[22]" value="تزرع" {{ old('answers.22.3') == 'تزرع' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">تزرعُ الأشجار</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="answers[22]" value="تغني" {{ old('answers.22.3') == 'تغني' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">تغني في الغابة</span>
            </label>
        </div>
    </div>
</div>




           <!-- Navigation Buttons -->
         <!-- Navigation Buttons -->
  <div class="navigation-buttons">
    <div class="left-buttons">
        <button id="prev" class="prev" type="button" disabled>السابق</button>
        <a href="{{ route('homepage') }}" class="exit-link">الخروج من الامتحان</a>
    </div>
    <button id="next" class="next" type="button">التالي</button>
    <button id="submit-btn" class="next" type="submit" style="display: none;">إرسال</button>

</div>
</form>

        </div>
    </div>

    <script>
        const timerElement = document.getElementById('timer');
const timerInput = document.getElementById('arSecTimer');


let timeRemaining = parseInt(localStorage.getItem('timeRemainingArSec')) || 15 * 60;

const updateTimer = () => {
    const minutes = Math.floor(timeRemaining / 60).toString().padStart(2, '0');
    const seconds = (timeRemaining % 60).toString().padStart(2, '0');
    timerElement.textContent = `${minutes}:${seconds}`;

    // Change timer color based on remaining time
    if (timeRemaining <= 3.75 * 60) { // Danger color for last 25%
        timerElement.style.backgroundColor = '#ef4444'; // Red
    } else if (timeRemaining <= 7.5 * 60) { // Warning color for half time
        timerElement.style.backgroundColor = '#f59e0b'; // Orange
    } else {
        timerElement.style.backgroundColor = '#10b981'; // Green
    }

    // Save the remaining time to localStorage
    localStorage.setItem('timeRemainingArSec', timeRemaining);

    // If time runs out, clear the interval and redirect
    if (timeRemaining === 0) {
        clearInterval(timerInterval);
        localStorage.removeItem('timeRemainingArSec'); // Clear the timer from localStorage
        window.location.href = '/timeout'; // Redirect to your timeout page
    }

    // Update the hidden input field
    timerInput.value = timeRemaining;

    timeRemaining--;
};

// Update the timer every second
const timerInterval = setInterval(updateTimer, 1000);

// Initial call to set timer immediately
updateTimer();
const questions = document.querySelectorAll('.question');
const prevButton = document.getElementById('prev');
const nextButton = document.getElementById('next');
const submitButton = document.getElementById('submit-btn');
let currentStep = 0;

function updateQuestions() {
    // Show the current question and hide others
    questions.forEach((question, index) => {
        question.classList.toggle('active', index === currentStep);
    });

    // Enable or disable the "السابق" button
    prevButton.disabled = currentStep === 0;

    // Show/hide "التالي" and "إرسال" buttons
    nextButton.style.display = currentStep === questions.length - 1 ? 'none' : 'inline-block';
    submitButton.style.display = currentStep === questions.length - 1 ? 'inline-block' : 'none';
}

// Event listener for the "السابق" button
prevButton.addEventListener('click', () => {
    if (currentStep > 0) {
        currentStep--;
        updateQuestions();
    }
});

// Event listener for the "التالي" button
nextButton.addEventListener('click', () => {
    if (currentStep < questions.length - 1) {
        currentStep++;
        updateQuestions();
    }
});

// Initialize the question navigation
updateQuestions();
    </script>
</body>

</html>
@endsection
