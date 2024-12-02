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
            <h1>ورقة عمل</h1>
            <div id="timer" class="timer">15:00</div>

            <!-- Questions -->
<div class="question active">
    <p>السؤال الاول </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        كوكب الأرض الوحيد الذي يوجد عليه حياة بسبب:
    </label>
    <div class="radio-group flex flex-col gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="reason" value="water_and_gravity">
            <span>وجود الماء والجاذبية</span>
        </label>

        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="reason" value="temperature">
            <span>درجة الحرارة المناسبة</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="reason" value="air_only">
            <span>وجود الهواء فقط</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="reason" value="all">
            <span>جميع ما سبق</span>
        </label>
    </div>

</div>
<!-- Questions -->
<div class="question ">
    <p>السؤال الثاني </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        تدور الأرض حول نفسها كل ساعة:
    </label>
    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-center gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="rotation" value="12_hours"">
            <span>12</span>
        </label>
        <label class="radio-item flex items-center justify-center gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="rotation" value="5_hours" >
            <span>5</span>
        </label>
        <label class="radio-item flex items-center justify-center gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="rotation" value="10_hours" >
            <span>10</span>
        </label>
        <label class="radio-item flex items-center justify-center gap-2 bg-pink-500 text-white p-4 rounded-lg">
            <input type="radio" name="rotation" value="24_hours" >
            <span>24</span>
        </label>
    </div>
</div>

<!-- Questions -->
<div class="question ">
    <p>السؤال الثالث </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        مكونات النظام البيئي:
    </label>
    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-center gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="ecosystem" value="water_air_soil_rocks" >
            <span>الماء، الهواء، و التربة و الصخور</span>
        </label>
        <label class="radio-item flex items-center justify-center gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="ecosystem" value="none_of_the_above" >
            <span>لا شيء من ما ذكر</span>
        </label>
        <label class="radio-item flex items-center justify-center gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="ecosystem" value="water_air_soil" >
            <span>الماء، الهواء و التربة</span>
        </label>
        <label class="radio-item flex items-center justify-center gap-2 bg-pink-500 text-white p-4 rounded-lg">
            <input type="radio" name="ecosystem" value="water_only" >
            <span>الماء فقط</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question ">
    <p>السؤال الرابع </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ما هو الإهتزاز الذي يحدث لصخور الأرض:
    </label>
    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="vibration" value="volcanoes" class="form-radio">
            <span>البراكين</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="vibration" value="storms" class="form-radio">
            <span>العواصف</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="vibration" value="earthquake" class="form-radio">
            <span>الزلزال</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question active">
    <p>السؤال الخامس </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        الطاقة الشمسية و الرياح:
    </label>
    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="energy" value="exhaustible" class="form-radio">
            <span>تنفذ</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="energy" value="nonrenewable" class="form-radio">
            <span>موارد طاقة غير متجددة</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="energy" value="renewable" class="form-radio">
            <span>موارد طاقة متجددة</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-pink-500 text-white p-4 rounded-lg">
            <input type="radio" name="energy" value="pollution" class="form-radio">
            <span>تلوث البيئة</span>
        </label>
    </div>
</div>

<!-- Questions -->
<div class="question ">
    <p>السؤال السادس </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        يحفر الناس حفر عميقة للوصول إلى ..................... تسمى الآبار:
    </label>
    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="wells" value="earth_resources" class="form-radio w-5 h-5">
            <span>موارد الأرض</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="wells" value="groundwater" class="form-radio w-5 h-5">
            <span>المياه الجوفية</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="wells" value="irrigation" class="form-radio w-5 h-5">
            <span>الري</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question active">
    <p>السؤال السابع </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        مصدر المياه المالحة على كوكب الأرض هو:
    </label>
    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="salt_water" value="lakes" class="form-radio w-5 h-5">
            <span>البحيرات</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="salt_water" value="springs" class="form-radio w-5 h-5">
            <span>الينابيع</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question active">
    <p>السؤال الثامن </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        تستخدم الأحافير لـ؟
    </label>
    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="fossils" value="geological_events" class="form-radio w-5 h-5">
            <span>ترتيب الأحداث الجيولوجية</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="fossils" value="oil_exploration" class="form-radio w-5 h-5">
            <span>تنقيب عن النفط</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="fossils" value="all_of_above" class="form-radio w-5 h-5">
            <span>جميع ما ذكر</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-pink-500 text-white p-4 rounded-lg">
            <input type="radio" name="fossils" value="rock_ages" class="form-radio w-5 h-5">
            <span>معرفة أعمار الصخور</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question active">
    <p>السؤال التاسع </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        النفط والفحم الحجري يعدان من؟
    </label>
    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="resource_type" value="fossil_fuel" class="form-radio w-5 h-5">
            <span>الوقود الأحفوري</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="resource_type" value="renewable_energy" class="form-radio w-5 h-5">
            <span>الطاقة المتجددة</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="resource_type" value="eco_friendly" class="form-radio w-5 h-5">
            <span>أصدقاء البيئة</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question active">
    <p>السؤال العاشر </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        هي معالم طبيعية لسطح الأرض:
    </label>
    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="earth_features" value="erosion" class="form-radio w-5 h-5">
            <span>التضاريس</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="earth_features" value="soil" class="form-radio w-5 h-5">
            <span>التعرية</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
            <input type="radio" name="earth_features" value="atmosphere" class="form-radio w-5 h-5">
            <span>الغلاف الجوي</span>
        </label>
    </div>
</div>
<!-- Questions -->
<div class="question active">
    <p>السؤال الحادي عشر </p>

    <label class="mb-4 block text-lg font-semibold text-gray-700">
        يعتبر المرجان مثالا للكائنات الحية:
    </label>
    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
            <input type="radio" name="coral_example" value="true" class="form-radio w-5 h-5">
            <span>صواب</span>
        </label>
        <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
            <input type="radio" name="coral_example" value="false" class="form-radio w-5 h-5">
            <span>خطأ</span>
        </label>
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
