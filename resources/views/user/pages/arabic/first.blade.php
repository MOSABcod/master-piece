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
                <label class="mb-2 block text-lg font-semibold text-gray-700">
                    حدد موقع المقطع الصوتي (عُ) في كلمة (شارعُ).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position" value="first">
                        <span>أول</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position" value="middle">
                        <span>وسط</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position" value="last">
                        <span>آخر</span>
                    </label>
                </div>
            </div>
            <div class="question ">
                <label class="mb-2 block text-lg font-semibold text-gray-700">
                    حدد موقع المقطع الصوتي (<span style="font-size: 1.2em; font-weight: bold;">جَ</span>) في كلمة (<span style="font-size: 1.2em; font-weight: bold;">جَبَلُ</span>).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position" value="first">
                        <span>أول</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position" value="middle">
                        <span>وسط</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position" value="last">
                        <span>آخر</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-2 block text-lg font-semibold text-gray-700">
                    حدد موقع المقطع الصوتي (<span style="font-size: 1.2em; font-weight: bold;">ط</span>) في كلمة (<span style="font-size: 1.2em; font-weight: bold;">مَطَر</span>).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position-matar" value="first">
                        <span>أول</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position-matar" value="middle">
                        <span>وسط</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="position-matar" value="last">
                        <span>آخر</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول الصورة المناسبة عند تركيب المقاطع الصوتية (<span style="font-size: 1.2em; font-weight: bold;">جَـ مَـ ل</span>).
                </label>
                <div class="radio-group grid grid-cols-1 gap-4 border border-gray-300 p-4 rounded-md bg-gray-100">
                    <!-- First Image Option -->
                    <label class="radio-item flex items-center gap-4 cursor-pointer" style="display: flex;flex-direction: row;">
                        <input type="radio" name="matching-image" value="camel" class="form-radio w-5 h-5">
                        <span class="flex items-center gap-2">
                            <img src="{{ asset('quiz images/1.1.png') }}" alt="Camel" class="w-24 h-24 rounded-md border border-gray-200">
                        </span>
                    </label>
                    <!-- Second Image Option -->
                    <label class="radio-item flex items-center gap-4 cursor-pointer" style="display: flex;flex-direction: row;">
                        <input type="radio" name="matching-image" value="rope" class="form-radio w-5 h-5">
                        <span class="flex items-center gap-2">
                            <img src="{{ asset('quiz images/1.2.png') }}" alt="Rope" class="w-24 h-24 rounded-md border border-gray-200">
                        </span>
                    </label>
                    <!-- Third Image Option -->
                    <label class="radio-item flex items-center gap-4 cursor-pointer" style="display: flex;flex-direction: row;">
                        <input type="radio" name="matching-image" value="mountain" class="form-radio w-5 h-5">
                        <span class="flex items-center gap-2">
                            <img src="{{ asset('quiz images/1.3.png') }}" alt="Mountain" class="w-24 h-24 rounded-md border border-gray-200">
                        </span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول الصورة المناسبة عند حذف المقطع الصوتي الأول من كلمة (<span style="font-size: 1.2em; font-weight: bold;">مَـنار</span>) لتصبح (<span style="font-size: 1.2em; font-weight: bold;">نار</span>).
                </label>
                <div class="radio-group grid grid-cols-3 gap-4 border border-gray-300 p-4 rounded-md bg-gray-100">
                    <!-- First Image Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer" style="display: flex;flex-direction: row;">
                        <input type="radio" name="matching-image" value="house" class="form-radio w-5 h-5">
                        <img src="{{ asset('quiz images/2.1.png') }}" alt="House" class="w-24 h-24 rounded-md border border-gray-200">
                    </label>
                    <!-- Second Image Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer" style="display: flex;flex-direction: row;">
                        <input type="radio" name="matching-image" value="mouse" class="form-radio w-5 h-5">
                        <img src="{{ asset('quiz images/2.2.png') }}" alt="Mouse" class="w-24 h-24 rounded-md border border-gray-200">
                    </label>
                    <!-- Third Image Option -->
                    <label class="radio-item flex flex-col items-center gap-2 cursor-pointer" style="display: flex;flex-direction: row;">
                        <input type="radio" name="matching-image" value="fire" class="form-radio w-5 h-5">
                        <img src="{{ asset('quiz images/2.3.png') }}" alt="Fire" class="w-24 h-24 rounded-md border border-gray-200">
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    كم مقطعًا صوتيًا نسمع عند تحليل كلمة (<span style="font-size: 1.2em; font-weight: bold;">عَلَمُ</span>)؟
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="syllable-count" value="2">
                        <span>٢</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="syllable-count" value="3">
                        <span>٣</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="syllable-count" value="4">
                        <span>٤</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول الكلمة التي تتكون من المقاطع الآتية (<span style="font-size: 1.2em; font-weight: bold;">جَ رَ سْ</span>).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="matching-word" value="جرس">
                        <span>جَرَسْ</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="matching-word" value="سرح">
                        <span>سَرَحْ</span>
                    </label>
                    <label class="radio-item flex items-center gap-2">
                        <input type="radio" name="matching-word" value="حرس">
                        <span>حَرَسْ</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول التحليل الصحيح لكلمة (<span style="font-size: 1.2em; font-weight: bold;">مَـجْـلِـسُ</span>).
                </label>
                <div class="radio-group flex justify-around items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <!-- First Option -->
                    <label class="radio-item flex flex-col items-center cursor-pointer"  style="display: flex;flex-direction: row;">
                        <input type="radio" name="analysis" value="option1" class="form-radio w-5 h-5 mb-2">
                        <span class="text-gray-700">
                            <div class="grid grid-cols-3 gap-2">
                                <span>مَـ</span>
                                <span>جْـ</span>
                                <span>لِـسُ</span>
                            </div>
                        </span>
                    </label>

                    <!-- Second Option -->
                    <label class="radio-item flex flex-col items-center cursor-pointer"  style="display: flex;flex-direction: row;">
                        <input type="radio" name="analysis" value="option2" class="form-radio w-5 h-5 mb-2">
                        <span class="text-gray-700">
                            <div class="grid grid-cols-3 gap-2">
                                <span>مَـجَـ</span>
                                <span>لَـ</span>
                                <span>سُ</span>
                            </div>
                        </span>
                    </label>

                    <!-- Third Option -->
                    <label class="radio-item flex flex-col items-center cursor-pointer"  style="display: flex;flex-direction: row;">
                        <input type="radio" name="analysis" value="option3" class="form-radio w-5 h-5 mb-2">
                        <span class="text-gray-700">
                            <div class="grid grid-cols-3 gap-2">
                                <span>مَـجْـ</span>
                                <span></span>
                                <span>لِـسْ</span>
                            </div>
                        </span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول كلمة (<span style="font-size: 1.2em; font-weight: bold;">صِفْرُ</span>).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <!-- First Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option1" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">صِفْرُ</span>
                    </label>
                    <!-- Second Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option2" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">صَفْرُ</span>
                    </label>
                    <!-- Third Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option3" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">صُفْرُ</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول كلمة (<span style="font-size: 1.2em; font-weight: bold;">زَيْدٍ</span>).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <!-- First Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option1" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">زَيْدُ</span>
                    </label>
                    <!-- Second Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option2" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">زَيْداً</span>
                    </label>
                    <!-- Third Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option3" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">زَيْدٍ</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول الكلمة التي تبدأ باللام القمرية (التي تُنطق) من الكلمات الآتية:
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <!-- First Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="lam-choice" value="option1" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">الشَّارِعُ</span>
                    </label>
                    <!-- Second Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="lam-choice" value="option2" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">الْبَيْتُ</span>
                    </label>
                    <!-- Third Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="lam-choice" value="option3" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">النَّظَرُ</span>
                    </label>
                </div>
            </div>
            <div class="question">
                <label class="mb-4 block text-lg font-semibold text-gray-700">
                    ضع دائرة حول كلمة (دَرَّسَ).
                </label>
                <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                    <!-- First Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option1" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">دَرَسَ</span>
                    </label>
                    <!-- Second Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option2" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">دَرْسَ</span>
                    </label>
                    <!-- Third Option -->
                    <label class="radio-item flex items-center gap-2 cursor-pointer">
                        <input type="radio" name="word-choice" value="option3" class="form-radio w-5 h-5">
                        <span style="font-size: 1.2em; font-weight: bold;">دَرَّسَ </span>
                    </label>
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
