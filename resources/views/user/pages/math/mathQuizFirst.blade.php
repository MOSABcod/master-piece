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

            <!-- Questions -->
            <div class="question active">
                <label>اختر العدد (اثنان).</label>
                <div class="radio-group">
                    <label><input type="radio" name="number" value="1"> 1</label>
                    <label><input type="radio" name="number" value="2"> 2</label>
                    <label><input type="radio" name="number" value="3"> 3</label>
                </div>
            </div>
            <div class="question">
                <label>اختر العدد (سبعة).</label>
                <div class="radio-group">
                    <label><input type="radio" name="number" value="5"> 5</label>
                    <label><input type="radio" name="number" value="7"> 7</label>
                    <label><input type="radio" name="number" value="8"> 8</label>
                </div>
            </div>



            <div class="question">
                <label>بداية أحمد 4 قطع شوكولاتة، إذا قُسمت كل قطعة إلى نصفين، كم قطعة شوكولاتة سيتناول كل منهما؟</label>
                <input type="number" class="answer" placeholder="أدخل الإجابة">
            </div>

            <div class="question">
                <label>اشترى سالم 5 بالونات، إذا طار منها بالونان، كم بالونًا بقي معه؟</label>
                <input type="number" class="answer" placeholder="أدخل الإجابة">
            </div>

            <div class="question">
                <label>ما هو العدد الأكبر؟</label>

                <div class="radio-group">
                    <label><input type="radio" name="largest-number" value="3"> العدد ثلاثة</label>
                    <label><input type="radio" name="largest-number" value="5"> العدد خمسة</label>
                    <label><input type="radio" name="largest-number" value="7"> العدد سبعة</label>
                    <label><input type="radio" name="largest-number" value="9"> العدد تسعة</label>
                </div>
            </div>

            <div class="question">
                <label>اختر   المجموعة الأكثر.</label>
                <div class="radio-group">
                    <!-- First Group -->
                    <label class="radio-item">
                        <input type="radio" name="most-stars" value="group1">
                        <span class="stars">⭐⭐⭐</span>
                    </label>
                    <!-- Second Group -->
                    <label class="radio-item">
                        <input type="radio" name="most-stars" value="group2">
                        <span class="stars">⭐⭐⭐⭐⭐</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label>اختر   المجموعة الاقل.</label>
                <div class="radio-group">
                    <!-- First Group -->
                    <label class="radio-item">
                        <input type="radio" name="most-stars" value="group1">
                        <span class="stars">⭐</span>
                    </label>
                    <!-- Second Group -->
                    <label class="radio-item">
                        <input type="radio" name="most-stars" value="group2">
                        <span class="stars">⭐⭐⭐</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label>اختر   المجموعة الاقل.</label>
                <div class="radio-group">
                    <!-- First Group -->
                    <label class="radio-item">
                        <input type="radio" name="most-stars" value="group1">
                        <span class="stars">⭐⭐⭐⭐</span><br>
                        <span class="stars" style="margin-right:29px">⭐⭐⭐⭐</span>
                    </label>
                    <!-- Second Group -->
                    <label class="radio-item">
                        <input type="radio" name="most-stars" value="group2">
                        <span class="stars">⭐⭐⭐</span><br>
                        <span class="stars" style="margin-right:29px">⭐⭐⭐</span>
                    </label>
                </div>
            </div>

            <div class="question">
                <label>اختر العدد الأكبر؟</label>

                <div class="radio-group">
                    <label><input type="radio" name="largest-number" value="6"> 6 </label>
                    <label><input type="radio" name="largest-number" value="7"> 7 </label>
                    <label><input type="radio" name="largest-number" value="9"> 9 </label>
                </div>
            </div>

            <div class="question">
                <label>اختر العدد الأصغر؟</label>

                <div class="radio-group">
                    <label><input type="radio" name="largest-number" value="11"> 11 </label>
                    <label><input type="radio" name="largest-number" value="7"> 7 </label>
                    <label><input type="radio" name="largest-number" value="4"> 4 </label>
                </div>
            </div>

            <div class="question">
    <label>مع محمد 9 تفاحات (🍎)، أراد أن يضع كل 3 تفاحات (🍎) في كيس، كم كيسًا يحتاج؟</label>
                <input type="number" class="answer" placeholder="أدخل الإجابة">
            </div>

            <div class="question">
    <label>اشترى محمد 4 دفاتر (📕) وأعطاه عمه 6 دفاتر (📕) أخرى، كم دفترًا أصبح مع محمد؟</label>
                <input type="number" class="answer" placeholder="أدخل الإجابة">
            </div>
            <div class="question">
                <label>ما عدد النجوم (⭐)؟ ضع دائرة حول العدد المناسب.</label>
                <div class="stars-box mb-4">
                    <div class="stars">
                        ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐ ⭐
                    </div>
                </div>
                <div class="radio-group flex justify-center gap-8">
                    <label class="flex items-center gap-2 text-lg">
                        <input type="radio" name="star-count" value="22" class="accent-blue-500">
                        22
                    </label>
                    <label class="flex items-center gap-2 text-lg">
                        <input type="radio" name="star-count" value="21" class="accent-blue-500">
                        21
                    </label>
                    <label class="flex items-center gap-2 text-lg">
                        <input type="radio" name="star-count" value="15" class="accent-blue-500">
                        15
                    </label>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب في المربع ما يتبقى عندما تأخذ 4 من 9.</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md" >
                    <span class="text-lg font-bold mx-2 text-gray-700" >9 - 4 = </span>
                    <input type="number" style="    margin-top: 10px;    margin-bottom: 10px; width:25%" class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="؟">
                </div>
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد الذي إذا أضفنا له 2 يصبح لدينا 5.</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">+ 2 = 5</span>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد الذي إذا طرحناه من 8 يصبح لدينا 6.</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">8 -</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 6</span>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب الناتج عند إضافة 2 إلى 7.</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">7 + 2 =</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد الذي إذا أضفناه إلى 16 يصبح الناتج 20.</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">16 +</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 20</span>
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
