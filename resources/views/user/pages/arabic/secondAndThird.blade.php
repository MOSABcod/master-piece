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
    padding: 12px 20px;
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

             <!-- السؤال الأول -->
    <div class="question active">
        <p>السؤال الأول</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            عند حذف المقطع الصوتي الأول من كلمة (<span style="font-weight: bold;">سعيد</span>) تنتج كلمة جديدة ذات معنى هي:
        </label>
        <div class="radio-group flex justify-around items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
            <!-- الخيار الأول -->
            <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                <input type="radio" name="word-choice1" value="بَعيدُ" {{ old('word-choice1') == 'بَعيدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span style="font-size: 1.2em; font-weight: bold;">بَعيدُ</span>
            </label>
            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                <input type="radio" name="word-choice1" value="عَنيدُ" {{ old('word-choice1') == 'عَنيدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span style="font-size: 1.2em; font-weight: bold;">عَنيدُ</span>
            </label>
            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                <input type="radio" name="word-choice1" value="عيدُ" {{ old('word-choice1') == 'عيدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span style="font-size: 1.2em; font-weight: bold;">عيدُ</span>
            </label>
            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
                <input type="radio" name="word-choice1" value="عَديدُ" {{ old('word-choice1') == 'عَديدُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
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
                <input type="radio" name="replace-syllable2" value="سَمَعَ" {{ old('replace-syllable2') == 'سَمَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>سَمَعَ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="replace-syllable2" value="لَمَعَ" {{ old('replace-syllable2') == 'لَمَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>لَمَعَ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="replace-syllable2" value="قَمَعَ" {{ old('replace-syllable2') == 'قَمَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>قَمَعَ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="replace-syllable2" value="وَضَعَ" {{ old('replace-syllable2') == 'وَضَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
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
                <input type="radio" name="word-with-madd3" value="مَحْمُودٌ" {{ old('word-with-madd3') == 'مَحْمُودٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>مَحْمُودٌ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-with-madd3" value="عِمَادٌ" {{ old('word-with-madd3') == 'عِمَادٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عِمَادٌ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-with-madd3" value="جَمِيلٌ" {{ old('word-with-madd3') == 'جَمِيلٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>جَمِيلٌ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-with-madd3" value="كِتَابٌ" {{ old('word-with-madd3') == 'كِتَابٌ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>كِتَابٌ</span>
            </label>
        </div>
    </div>

    <!-- السؤال الرابع -->
    <div class="question">
        <p>السؤال الرابع</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            ضع دائرة حول كلمة (<span style="font-size: 1.2em; font-weight: bold;">عَلَََمَ</span>).
        </label>
        <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="choose-word4" value="عَلِمْ" {{ old('choose-word4') == 'عَلِمْ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عَلِمْ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="choose-word4" value="عَلَََمَ" {{ old('choose-word4') == 'عَلَََمَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عَلَََمَ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="choose-word4" value="عِلْمُ" {{ old('choose-word4') == 'عِلْمُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عِلْمُ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="choose-word4" value="عَلَمُ" {{ old('choose-word4') == 'عَلَمُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
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
                <input type="radio" name="shamsi-lam5" value="العنب" {{ old('shamsi-lam5') == 'العنب' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>العنب</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="shamsi-lam5" value="فاكهتي" {{ old('shamsi-lam5') == 'فاكهتي' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>فاكهتي</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="shamsi-lam5" value="المُفضَّلة" {{ old('shamsi-lam5') == 'المُفضَّلة' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>المُفضَّلة</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="shamsi-lam5" value="في" {{ old('shamsi-lam5') == 'في' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>في</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="shamsi-lam5" value="فصل" {{ old('shamsi-lam5') == 'فصل' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>فصل</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="shamsi-lam5" value="الصيف" {{ old('shamsi-lam5') == 'الصيف' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>الصيف</span>
            </label>
        </div>
    </div>

    <!-- السؤال السادس -->
    <div class="question">
        <p>السؤال السادس</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            ضع دائرة حول كلمة (لَبَن).
        </label>
        <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection6" value="لَبْنَا" {{ old('word-selection6') == 'لَبْنَا' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>لَبْنَا</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection6" value="لَبَنُ" {{ old('word-selection6') == 'لَبَنُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>لَبَنُ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection6" value="لَبَنٍ" {{ old('word-selection6') == 'لَبَنٍ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>لَبَنٍ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection6" value="لَبَنْ" {{ old('word-selection6') == 'لَبَنْ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>لَبَنْ</span>
            </label>
        </div>
    </div>

    <!-- السؤال السابع -->
    <div class="question">
        <p>السؤال السابع</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            ضع دائرة حول كلمة (سَحَبَ).
        </label>
        <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection7" value="سَحَبَ" {{ old('word-selection7') == 'سَحَبَ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>سَحَبَ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection7" value="سَحْبُ" {{ old('word-selection7') == 'سَحْبُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>سَحْبُ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection7" value="سَحْبٍ" {{ old('word-selection7') == 'سَحْبٍ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>سَحْبٍ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="word-selection7" value="سَحَابَةُ" {{ old('word-selection7') == 'سَحَابَةُ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>سَحَابَةُ</span>
            </label>
        </div>
    </div>

    <!-- السؤال الثامن -->
    <div class="question">
        <p>السؤال الثامن</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            ضع دائرة حول كلمة (عَمِلَتْ).
        </label>
        <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="worked-word8" value="عملت" {{ old('worked-word8') == 'عملت' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عَمِلَتْ</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="worked-word8" value="عملة" {{ old('worked-word8') == 'عملة' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عُمْلَة</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="worked-word8" value="عملة-with-shadda" {{ old('worked-word8') == 'عملة-with-shadda' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span>عَمَّلَة</span>
            </label>
            <label class="radio-item flex items-center gap-2 cursor-pointer">
                <input type="radio" name="worked-word8" value="عمل" {{ old('worked-word8') == 'عمل' ? 'checked' : '' }} class="form-radio w-5 h-5">
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
                <input type="radio" name="analysis9" value="option1" {{ old('analysis9') == 'option1' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">
                    اِسْ &nbsp; تَـ &nbsp; نْـ &nbsp; شَـ &nbsp; قَ
                </span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex items-center cursor-pointer gap-2">
                <input type="radio" name="analysis9" value="option2" {{ old('analysis9') == 'option2' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">
                    اِ&nbsp; سْـ &nbsp; &nbsp;نَـتَـ  &nbsp; شَـقْ
                </span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex items-center cursor-pointer gap-2">
                <input type="radio" name="analysis9" value="option3" {{ old('analysis9') == 'option3' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">
                    اِسْـ &nbsp; تَـ &nbsp; شَـنْـ  &nbsp; قْ
                </span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex items-center cursor-pointer gap-2">
                <input type="radio" name="analysis9" value="option4" {{ old('analysis9') == 'option4' ? 'checked' : '' }} class="form-radio w-5 h-5">
                <span class="text-gray-700">
                    اِسْـتَـ&nbsp;  &nbsp; نْـ &nbsp; شَـ &nbsp; قَ
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
                <input type="radio" name="meaning10" value="رَمى" {{ old('meaning10') == 'رَمى' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">رَمى</span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning10" value="شَرِبَ" {{ old('meaning10') == 'شَرِبَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">شَرِبَ</span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning10" value="أَكَلَ" {{ old('meaning10') == 'أَكَلَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">أَكَلَ</span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning10" value="تَرَكَ" {{ old('meaning10') == 'تَرَكَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
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
                <input type="radio" name="meaning11" value="أَخَذَ" {{ old('meaning11') == 'أَخَذَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">أَخَذَ</span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning11" value="قَطَعَ" {{ old('meaning11') == 'قَطَعَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">قَطَعَ</span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning11" value="سَارَ" {{ old('meaning11') == 'سَارَ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">سَارَ</span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning11" value="أَحَبَّ" {{ old('meaning11') == 'أَحَبَّ' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
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
                <input type="radio" name="meaning12" value="مَفْقُود" {{ old('meaning12') == 'مَفْقُود' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">مَفْقُود</span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning12" value="إِطَار" {{ old('meaning12') == 'إِطَار' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">إِطَار</span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning12" value="كُرْسِي" {{ old('meaning12') == 'كُرْسِي' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">كُرْسِي</span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning12" value="سُرْعَة" {{ old('meaning12') == 'سُرْعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
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
                <input type="radio" name="meaning13" value="ضَعْف" {{ old('meaning13') == 'ضَعْف' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">ضَعْف</span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning13" value="بُطْء" {{ old('meaning13') == 'بُطْء' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">بُطْء</span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning13" value="إِطَار" {{ old('meaning13') == 'إِطَار' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">إِطَار</span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="meaning13" value="سُرْعَة" {{ old('meaning13') == 'سُرْعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
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
                <input type="radio" name="different-word14" value="مَزْرَعَة" {{ old('different-word14') == 'مَزْرَعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">مَزْرَعَة</span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="different-word14" value="مَزَارِع" {{ old('different-word14') == 'مَزَارِع' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">مَزَارِع</span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="different-word14" value="ثِمَار" {{ old('different-word14') == 'ثِمَار' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">ثِمَار</span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="different-word14" value="زِرَاعَة" {{ old('different-word14') == 'زِرَاعَة' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">زِرَاعَة</span>
            </label>
        </div>
    </div>

    <!-- السؤال الخامس عشر -->
    <div class="question">
        <p>السؤال الخامس عشر</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            اختر ثلاث كلمات مرتبطة بكلمة (رَمَضَان).
        </label>
        <div class="radio-group grid grid-cols-4 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
            <!-- الصف الأول -->
            <div class="grid grid-cols-4 gap-4">
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="صِيَام" {{ (is_array(old('related-words15')) && in_array('صِيَام', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">صِيَام</span>
                </label>
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="زَكَاة" {{ (is_array(old('related-words15')) && in_array('زَكَاة', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">زَكَاة</span>
                </label>
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="نَظَّارَات" {{ (is_array(old('related-words15')) && in_array('نَظَّارَات', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">نَظَّارَات</span>
                </label>
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="هِلَال" {{ (is_array(old('related-words15')) && in_array('هِلَال', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">هِلَال</span>
                </label>
            </div>

            <!-- الصف الثاني -->
            <div class="grid grid-cols-4 gap-4">
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="فُطُور" {{ (is_array(old('related-words15')) && in_array('فُطُور', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">فُطُور</span>
                </label>
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="حَاسُوب" {{ (is_array(old('related-words15')) && in_array('حَاسُوب', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">حَاسُوب</span>
                </label>
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="أَنْف" {{ (is_array(old('related-words15')) && in_array('أَنْف', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">أَنْف</span>
                </label>
                <label class="radio-item flex flex-col items-center cursor-pointer">
                    <input type="checkbox" name="related-words15[]" value="رَأْس" {{ (is_array(old('related-words15')) && in_array('رَأْس', old('related-words15'))) ? 'checked' : '' }} class="form-checkbox w-5 h-5 mb-2">
                    <span class="text-gray-700">رَأْس</span>
                </label>
            </div>
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
                <input type="radio" name="description16" value="لَذِيذًا" {{ old('description16') == 'لَذِيذًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">لَذِيذًا</span>
            </label>

            <!-- الخيار الثاني -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="description16" value="بَعِيدًا" {{ old('description16') == 'بَعِيدًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">بَعِيدًا</span>
            </label>

            <!-- الخيار الثالث -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="description16" value="عَالِيًا" {{ old('description16') == 'عَالِيًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">عَالِيًا</span>
            </label>

            <!-- الخيار الرابع -->
            <label class="radio-item flex flex-col items-center cursor-pointer">
                <input type="radio" name="description16" value="نَحِيفًا" {{ old('description16') == 'نَحِيفًا' ? 'checked' : '' }} class="form-radio w-5 h-5 mb-2">
                <span class="text-gray-700">نَحِيفًا</span>
            </label>
        </div>
    </div>

    <!-- السؤال السابع عشر -->
    <div class="question">
        <p>السؤال السابع عشر</p>
        <label class="mb-4 block text-lg font-semibold text-gray-700">
            ماذا أقول لمن عاد من السَّفر؟ (<span style="text-decoration: underline;">____________</span>)
        </label>
        <textarea name="response17" value="{{ old('response17') }}" class="answer w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                  placeholder="اكتب إجابتك هنا..."></textarea>
    </div>

    <!-- قسم الأسئلة المقروءة -->
    <div class="questions">
        <!-- السؤال الثامن عشر -->
        <div class="question mb-4">
            <p>السؤال الثامن عشر</p>
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
                    <input type="radio" name="question18-1" value="القصص" {{ old('question18-1') == 'القصص' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">القصصُ عن صناعة القوارب</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question18-1" value="الأوراق" {{ old('question18-1') == 'الأوراق' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">الأوراقُ الخضراءُ للأشجار</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question18-1" value="الأشجار" {{ old('question18-1') == 'الأشجار' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">الأشجارُ في الغابة</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question18-1" value="العائلة" {{ old('question18-1') == 'العائلة' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">القصةُ عن عائلةٍ تقرأ الكُتُبَ</span>
                </label>
            </div>
        </div>

        <!-- السؤال التاسع عشر -->
        <div class="question mb-4">
            <p>السؤال التاسع عشر</p>
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
                    <input type="radio" name="question19-2" value="كتب" {{ old('question19-2') == 'كتب' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">كُتُبٌ صغيرةٌ</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question19-2" value="أشجار" {{ old('question19-2') == 'أشجار' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">أشجارٌ في الغابة</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question19-2" value="أوراق" {{ old('question19-2') == 'أوراق' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">أوراقٌ خضراء</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question19-2" value="قصة" {{ old('question19-2') == 'قصة' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">قصةٌ عن القوارب</span>
                </label>
            </div>
        </div>

        <!-- السؤال العشرون -->
        <div class="question">
            <p>السؤال العشرون</p>
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
                    <input type="radio" name="question20-3" value="تقرأ" {{ old('question20-3') == 'تقرأ' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">تقرأُ القوارب</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question20-3" value="تصنع" {{ old('question20-3') == 'تصنع' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">تصنعُ القوارب</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question20-3" value="تزرع" {{ old('question20-3') == 'تزرع' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">تزرعُ الأشجار</span>
                </label>
                <label class="radio-item flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="question20-3" value="تغني" {{ old('question20-3') == 'تغني' ? 'checked' : '' }} class="form-radio w-5 h-5">
                    <span class="text-gray-700">تغني في الغابة</span>
                </label>
            </div>
        </div>
    </div>




           <!-- Navigation Buttons -->
           <div class="navigation-buttons">
            <div class="left-buttons">
                <button id="prev" class="prev" disabled>السابق</button>
                <a href="{{ route('homepage') }}" class="exit-link">الخروج من الامتحان</a>
            </div>
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
