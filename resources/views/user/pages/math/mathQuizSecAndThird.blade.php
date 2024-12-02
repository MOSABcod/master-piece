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

            <!-- Questions -->
            <div class="question active">
                <label>اختر العدد (خمسة).</label>
                <div class="radio-group">
                    <label><input type="radio" name="number" value="5"> 5</label>
                    <label><input type="radio" name="number" value="6"> 6</label>
                    <label><input type="radio" name="number" value="7"> 7</label>
                </div>
            </div>
            <div class="question active">
                <label>اختر العدد (مئة وخمسة وستون).</label>
                <div class="radio-group">
                    <label><input type="radio" name="number" value="156"> 156</label>
                    <label><input type="radio" name="number" value="165"> 165</label>
                    <label><input type="radio" name="number" value="651"> 651</label>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد  المناسب في المربع   </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">18 +</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 21</span>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد الذي إذا أضفناه إلى 17 يصبح الناتج 60.</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">17 +</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 60</span>
                </div>
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد المناسب في المربع.
                    <span class="text-lg font-bold mx-2 text-gray-700">15 ,</span>
                        <input type="number"
                               class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                               style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700">, 25 , 30</span>

                </label>
                    <div class="radio-group">
                        <label><input type="radio" name="number" value="20"> 20</label>
                        <label><input type="radio" name="number" value="40">40</label>
                        <label><input type="radio" name="number" value="10"> 10</label>
                    </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد المناسب في المربع.
                    <span class="text-lg font-bold mx-2 text-gray-700">120 , 130 </span>
                        <input type="number"
                               class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                               style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700">, 150</span>

                </label>
                    <div class="radio-group">
                        <label><input type="radio" name="number" value="135"> 135</label>
                        <label><input type="radio" name="number" value="125">125</label>
                        <label><input type="radio" name="number" value="140"> 140</label>
                    </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد المناسب في المربع.
                    <span class="text-lg font-bold mx-2 text-gray-700">3050 , 3150 , 3250 </span>
                        <input type="number"
                               class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                               style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700"></span>

                </label>
                    <div class="radio-group">
                        <label><input type="radio" name="number" value="3350"> 3350</label>
                        <label><input type="radio" name="number" value="3200">3200</label>
                        <label><input type="radio" name="number" value="3300"> 3300</label>
                    </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد المناسب في المربع.
                    <span class="text-lg font-bold mx-2 text-gray-700">112 , 114  </span>
                        <input type="number"
                               class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                               style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700"> , 118</span>

                </label>
                    <div class="radio-group">
                        <label><input type="radio" name="number" value="115"> 115</label>
                        <label><input type="radio" name="number" value="116">116</label>
                        <label><input type="radio" name="number" value="117"> 117</label>
                    </div>
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد الذي إذا طرحنا منه 30 يصبح الناتج 270.
                </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">- 30 = 270</span>
                </div>
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    مع حمزة 57 دينارًا اشترى ملابس بـ 25 دينارًا، كم دينارًا بقي معه؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    أراد يزن زراعة 40 شجرة زيتون في 5 صفوف، فكم شجرة زيتون يحتاج في الصف الواحد؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    جمعت عائشة 65 طابعًا بريديًا وجمع أخوها محمد 35 طابعًا بريديًا، كم يزيد عدد الطوابع التي جمعتها عائشة عن التي جمعها محمد؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    إذا كان لديك 4 مزهريات <span class="inline-block">🌿</span><span class="inline-block">🌿</span><span class="inline-block">🌿</span><span class="inline-block">🌿</span>، وفي كل مزهرية 3 أزهار <span class="inline-block">🌹</span><span class="inline-block">🌹</span><span class="inline-block">🌹</span>، ما عدد الأزهار الكلي؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    لدى علي سلة من التفاح فيها 62 حبة <span class="inline-block">🍎</span>، تقاسمها بالتساوي مع أخته ليلى، فكم حبة تفاح <span class="inline-block">🍎</span> نصيب كل منهما؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد الذي إذا طرحناه من 670 يصبح الناتج 170.
                </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">670 -</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 170</span>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد الذي إذا أضفناه إلى 7 يصبح الناتج 18.
                </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">7 +</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 18</span>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد الذي إذا أضفناه إلى 66 يصبح الناتج 70.
                </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">+ 66 = 70</span>
                </div>
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد الذي إذا طرح من 85 يصبح الناتج 80.
                </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">85 -</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    <span class="text-lg font-bold mx-2 text-gray-700">= 80</span>
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    لدينا 10 أطفال في الصف، إذا كان 6 منهم بنين والباقي بنات، فكم عدد البنات في الصف؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    اكتب العدد الذي يمثل مجموع 207 و 83.
                </label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">207 +</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">83</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">=</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700 text-right">
                    ضع في المربع الناتج الذي يمثل ضعف العدد 42.
                </label>
                <div class="equation-box mx-auto flex items-center justify-start border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">ضعف العدد 42 يساوي</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700 text-right">
                    ضع في المربع الناتج الذي يمثل نصف العدد 54.
                </label>
                <div class="equation-box mx-auto flex items-center justify-start border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">نصف العدد 54 يساوي</span>

                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    لدى سارة مجموعة من الطوابع البريدية، وزعت 20 طابعًا وتبقى معها 45 طابعًا، فكم طابعًا كان معها؟
                </label>
                <input type="number"
                       class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                       placeholder="أدخل الإجابة">
            </div>

            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد المناسب في المربع</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">356</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">-</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">38</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">=</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                </div>
            </div>
            <div class="question mt-6">
                <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد المناسب في المربع</label>
                <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                    <span class="text-lg font-bold mx-2 text-gray-700">16</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">×</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">10</span>
                    <span class="text-lg font-bold mx-2 text-gray-700">=</span>
                    <input type="number"
                           class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                           placeholder="؟"
                           style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
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
