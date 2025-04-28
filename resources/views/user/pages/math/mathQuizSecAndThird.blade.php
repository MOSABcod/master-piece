@extends('user.layout.mainlayout')

@section('content')

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
        /*  */
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
    /*  */
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
/*  */
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

<body dir="rtl" >
    <div class="wrapper mt-4 mb-4" style="text-align: right; display: block;">
        <div class="container">
            <div id="timer" class="timer">15:00</div>

            <h1>اختبار الرياضيات</h1>

            <!-- Form Start -->
            <form id="questions-form" method="POST" action="{{ route('save.math.Sec') }}">
                @csrf
                <!-- Hidden input to store the remaining time -->
                <input type="hidden" name="timer" id="mathSecTimer" > <!-- 15 minutes in seconds -->

                <!-- Question 1 -->
                <div class="question active" >
                    <p>السؤال الأول</p>
                    <label>اختر العدد (خمسة).</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="answers[1]" value="5" {{ old('answers.1') == '5' ? 'checked' : '' }}> 5
                        </label>
                        <label>
                            <input type="radio" name="answers[1]" value="6" {{ old('answers.1') == '6' ? 'checked' : '' }}> 6
                        </label>
                        <label>
                            <input type="radio" name="answers[1]" value="7" {{ old('answers.1') == '7' ? 'checked' : '' }}> 7
                        </label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question">
                    <p>السؤال الثاني</p>
                    <label>اختر العدد (مئة وخمسة وستون).</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="answers[2]" value="156" {{ old('answers.2') == '156' ? 'checked' : '' }}> 156
                        </label>
                        <label>
                            <input type="radio" name="answers[2]" value="165" {{ old('answers.2') == '165' ? 'checked' : '' }}> 165
                        </label>
                        <label>
                            <input type="radio" name="answers[2]" value="651" {{ old('answers.2') == '651' ? 'checked' : '' }}> 651
                        </label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question mt-6">
                    <p>السؤال الثالث</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد المناسب في المربع</label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">18 +</span>
                        <input type="number" name="answers[3]" value="{{ old('answers.3') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">= 21</span>
                    </div>
                </div>

                <!-- Question 4 -->
                <div class="question mt-6">
                    <p>السؤال الرابع</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد الذي إذا أضفناه إلى 17 يصبح الناتج 60.</label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">17 +</span>
                        <input type="number" name="answers[4]" value="{{ old('answers.4') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">= 60</span>
                    </div>
                </div>

                <!-- Question 5 -->
                <div class="question mt-6">
                    <p>السؤال الخامس</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد المناسب في المربع.
                        <span class="text-lg font-bold mx-2 text-gray-700">15 ,</span>
                        <input type="number" name="answers[5]" value="{{ old('answers.5') }}"
                            class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700">, 25 , 30</span>
                    </label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="answers[5]" value="20" {{ old('answers.5') == '20' ? 'checked' : '' }}> 20
                        </label>
                        <label>
                            <input type="radio" name="answers[5]" value="40" {{ old('answers.5') == '40' ? 'checked' : '' }}> 40
                        </label>
                        <label>
                            <input type="radio" name="answers[5]" value="10" {{ old('answers.5') == '10' ? 'checked' : '' }}> 10
                        </label>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="question mt-6">
                    <p>السؤال السادس</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد المناسب في المربع.
                        <span class="text-lg font-bold mx-2 text-gray-700">120 , 130 </span>
                        <input type="number" name="answers[6]" value="{{ old('answers.6') }}"
                            class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700">, 150</span>
                    </label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="answers[6]" value="135" {{ old('answers.6') == '135' ? 'checked' : '' }}> 135
                        </label>
                        <label>
                            <input type="radio" name="answers[6]" value="125" {{ old('answers.6') == '125' ? 'checked' : '' }}> 125
                        </label>
                        <label>
                            <input type="radio" name="answers[6]" value="140" {{ old('answers.6') == '140' ? 'checked' : '' }}> 140
                        </label>
                    </div>
                </div>

                <!-- Question 7 -->
                <div class="question mt-6">
                    <p>السؤال السابع</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد المناسب في المربع.
                        <span class="text-lg font-bold mx-2 text-gray-700">3050 , 3150 , 3250 </span>
                        <input type="number" name="answers[7]" value="{{ old('answers.7') }}"
                            class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700"></span>
                    </label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="answers[7]" value="3350" {{ old('answers.7') == '3350' ? 'checked' : '' }}> 3350
                        </label>
                        <label>
                            <input type="radio" name="answers[7]" value="3200" {{ old('answers.7') == '3200' ? 'checked' : '' }}> 3200
                        </label>
                        <label>
                            <input type="radio" name="answers[7]" value="3300" {{ old('answers.7') == '3300' ? 'checked' : '' }}> 3300
                        </label>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="question mt-6">
                    <p>السؤال الثامن</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد المناسب في المربع.
                        <span class="text-lg font-bold mx-2 text-gray-700">112 , 114  </span>
                        <input type="number" name="answers[8]" value="{{ old('answers.8') }}"
                            class="answer text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            style="width: 40px; height:40px" disabled>
                        <span class="text-lg font-bold mx-2 text-gray-700"> , 118</span>
                    </label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" name="answers[8]" value="115" {{ old('answers.8') == '115' ? 'checked' : '' }}> 115
                        </label>
                        <label>
                            <input type="radio" name="answers[8]" value="116" {{ old('answers.8') == '116' ? 'checked' : '' }}> 116
                        </label>
                        <label>
                            <input type="radio" name="answers[8]" value="117" {{ old('answers.8') == '117' ? 'checked' : '' }}> 117
                        </label>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="question mt-6">
                    <p>السؤال التاسع</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد الذي إذا طرحنا منه 30 يصبح الناتج 270.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <input type="number" name="answers[9]" value="{{ old('answers.9') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">- 30 = 270</span>
                    </div>
                </div>

                <!-- Question 10 -->
                <div class="question mt-6">
                    <p>السؤال العاشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        مع حمزة 57 دينارًا اشترى ملابس بـ 25 دينارًا، كم دينارًا بقي معه؟
                    </label>
                    <input type="number" name="answers[10]" value="{{ old('answers.10') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 11 -->
                <div class="question mt-6">
                    <p>السؤال الحادي عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        أراد يزن زراعة 40 شجرة زيتون في 5 صفوف، فكم شجرة زيتون يحتاج في الصف الواحد؟
                    </label>
                    <input type="number" name="answers[11]" value="{{ old('answers.11') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 12 -->
                <div class="question mt-6">
                    <p>السؤال الثاني عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        جمعت عائشة 65 طابعًا بريديًا وجمع أخوها محمد 35 طابعًا بريديًا، كم يزيد عدد الطوابع التي جمعتها عائشة عن التي جمعها محمد؟
                    </label>
                    <input type="number" name="answers[12]" value="{{ old('answers.12') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 13 -->
                <div class="question mt-6">
                    <p>السؤال الثالث عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        إذا كان لديك 4 مزهريات <span class="inline-block">🌿</span><span class="inline-block">🌿</span><span class="inline-block">🌿</span><span class="inline-block">🌿</span>، وفي كل مزهرية 3 أزهار <span class="inline-block">🌹</span><span class="inline-block">🌹</span><span class="inline-block">🌹</span>، ما عدد الأزهار الكلي؟
                    </label>
                    <input type="number" name="answers[13]" value="{{ old('answers.13') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 14 -->
                <div class="question mt-6">
                    <p>السؤال الرابع عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        لدى علي سلة من التفاح فيها 62 حبة <span class="inline-block">🍎</span>، تقاسمها بالتساوي مع أخته ليلى، فكم حبة تفاح <span class="inline-block">🍎</span> نصيب كل منهما؟
                    </label>
                    <input type="number" name="answers[14]" value="{{ old('answers.14') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 15 -->
                <div class="question mt-6">
                    <p>السؤال الخامس عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد الذي إذا طرحناه من 670 يصبح الناتج 170.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">670 -</span>
                        <input type="number" name="answers[15]" value="{{ old('answers.15') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">= 170</span>
                    </div>
                </div>

                <!-- Question 16 -->
                <div class="question mt-6">
                    <p>السؤال السادس عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد الذي إذا أضفناه إلى 7 يصبح الناتج 18.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">7 +</span>
                        <input type="number" name="answers[16]" value="{{ old('answers.16') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">= 18</span>
                    </div>
                </div>

                <!-- Question 17 -->
                <div class="question mt-6">
                    <p>السؤال السابع عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد الذي إذا أضفناه إلى 66 يصبح الناتج 70.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <input type="number" name="answers[17]" value="{{ old('answers.17') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">+ 66 = 70</span>
                    </div>
                </div>

                <!-- Question 18 -->
                <div class="question mt-6">
                    <p>السؤال الثامن عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد الذي إذا طرح من 85 يصبح الناتج 80.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">85 -</span>
                        <input type="number" name="answers[18]" value="{{ old('answers.18') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                        <span class="text-lg font-bold mx-2 text-gray-700">= 80</span>
                    </div>
                </div>

                <!-- Question 19 -->
                <div class="question mt-6">
                    <p>السؤال التاسع عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        لدينا 10 أطفال في الصف، إذا كان 6 منهم بنين والباقي بنات، فكم عدد البنات في الصف؟
                    </label>
                    <input type="number" name="answers[19]" value="{{ old('answers.19') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 20 -->
                <div class="question mt-6">
                    <p>السؤال العشرون</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        اكتب العدد الذي يمثل مجموع 207 و 83.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">207 +</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">83</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">=</span>
                        <input type="number" name="answers[20]" value="{{ old('answers.20') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    </div>
                </div>

                <!-- Question 21 -->
                <div class="question mt-6">
                    <p>السؤال الحادي والعشرون</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700 text-right">
                        ضع في المربع الناتج الذي يمثل ضعف العدد 42.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-start border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">ضعف العدد 42 يساوي</span>
                        <input type="number" name="answers[21]" value="{{ old('answers.21') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    </div>
                </div>

                <!-- Question 22 -->
                <div class="question mt-6">
                    <p>السؤال الثاني والعشرون</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700 text-right">
                        ضع في المربع الناتج الذي يمثل نصف العدد 54.
                    </label>
                    <div class="equation-box mx-auto flex items-center justify-start border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">نصف العدد 54 يساوي</span>
                        <input type="number" name="answers[22]" value="{{ old('answers.22') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    </div>
                </div>

                <!-- Question 23 -->
                <div class="question mt-6">
                    <p>السؤال الثالث والعشرون</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        لدى سارة مجموعة من الطوابع البريدية، وزعت 20 طابعًا وتبقى معها 45 طابعًا، فكم طابعًا كان معها؟
                    </label>
                    <input type="number" name="answers[23]" value="{{ old('answers.23') }}"
                        class="answer answer-input text-lg border border-gray-400 rounded-md text-start focus:outline-none focus:ring-2 focus:ring-blue-500 w-full max-w-md mx-auto p-2"
                        placeholder="أدخل الإجابة">
                </div>

                <!-- Question 24 -->
                <div class="question mt-6">
                    <p>السؤال الرابع والعشرون</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد المناسب في المربع</label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">356</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">-</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">38</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">=</span>
                        <input type="number" name="answers[24]" value="{{ old('answers.24') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    </div>
                </div>

                <!-- Question 25 -->
                <div class="question mt-6">
                    <p>السؤال الخامس والعشرون</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">اكتب العدد المناسب في المربع</label>
                    <div class="equation-box mx-auto flex items-center justify-center border border-gray-300 rounded-lg p-4 bg-gray-50 w-full max-w-md">
                        <span class="text-lg font-bold mx-2 text-gray-700">16</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">×</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">10</span>
                        <span class="text-lg font-bold mx-2 text-gray-700">=</span>
                        <input type="number" name="answers[25]" value="{{ old('answers.25') }}"
                            class="answer answer-input text-lg border border-gray-400 rounded-md text-center focus:outline-none focus:ring-2 focus:ring-blue-500 mx-2"
                            placeholder="؟" style="width: 25%; margin-top: 10px; margin-bottom: 10px;">
                    </div>
                </div>

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
            <!-- Form End -->
        </div>
    </div>

    <script>
        // Timer Functionality with localStorage
        const timerElement = document.getElementById('timer');
        const timerInput = document.getElementById('mathSecTimer');

        let timeRemaining = parseInt(localStorage.getItem('timeRemainingMathSec')) || 25 * 60; // 15 minutes in seconds

        const updateTimer = () => {
            const minutes = Math.floor(timeRemaining / 60).toString().padStart(2, '0');
            const seconds = (timeRemaining % 60).toString().padStart(2, '0');
            timerElement.textContent = `${minutes}:${seconds}`;

            // Change timer color based on remaining time
            if (timeRemaining <= 3.75 * 60) { // Last 25%
                timerElement.classList.add('danger');
                timerElement.classList.remove('warning', 'green');
            } else if (timeRemaining <= 7.5 * 60) { // Last 50%
                timerElement.classList.add('warning');
                timerElement.classList.remove('danger', 'green');
            } else {
                timerElement.classList.remove('danger', 'warning');
                timerElement.classList.add('green');
            }

            // Save the remaining time to localStorage
            localStorage.setItem('timeRemainingMathSec', timeRemaining);

            // If time runs out, clear the interval and submit the form
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                localStorage.removeItem('timeRemainingMathSec'); // Clear the timer from localStorage
                document.getElementById('questions-form').submit(); // Automatically submit the form
                // Alternatively, redirect to a timeout page:
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

        // Question Navigation
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
            if (currentStep === questions.length - 1) {
                nextButton.style.display = 'none';
                submitButton.style.display = 'inline-block';
            } else {
                nextButton.style.display = 'inline-block';
                submitButton.style.display = 'none';
            }
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
