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
            <h1>ورقة عمل</h1>
            <div id="timer" class="timer">15:00</div>

            <!-- Questions -->
            <form id="questions-form" method="POST" action="{{ route('save.ar.Science') }}">
                @csrf
                <!-- Hidden input to store the remaining time -->
                <input type="hidden" name="timer" id="scienceTimer">

                <!-- السؤال الاول -->
                <div class="question active">
                    <p>السؤال الأول</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        كوكب الأرض الوحيد الذي يوجد عليه حياة بسبب:
                    </label>
                    <div class="radio-group flex flex-col gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.1.وجود الماء والجاذبية' => 'وجود الماء والجاذبية',
                            'answers.1.درجة الحرارة المناسبة' => 'درجة الحرارة المناسبة',
                            'answers.1.وجود الهواء فقط' => 'وجود الهواء فقط',
                            'answers.1.جميع ما سبق' => 'جميع ما سبق'
                        ] as $name => $label)
                            <label class="radio-item flex items-center gap-2">
                                <input type="radio" name="answers[1]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.1') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال الثاني -->
                <div class="question">
                    <p>السؤال الثاني</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        تدور الأرض حول نفسها كل ساعة:
                    </label>
                    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.2.12' => '12',
                            'answers.2.5' => '5',
                            'answers.2.10' => '10',
                            'answers.2.24' => '24'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-center gap-2 bg-blue-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[2]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.2') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال الثالث -->
                <div class="question">
                    <p>السؤال الثالث</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        مكونات النظام البيئي:
                    </label>
                    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.3.الماء، الهواء، و التربة و الصخور' => 'الماء، الهواء، و التربة و الصخور',
                            'answers.3.لا شيء من ما ذكر' => 'لا شيء من ما ذكر',
                            'answers.3.الماء، الهواء و التربة' => 'الماء، الهواء و التربة',
                            'answers.3.الماء فقط' => 'الماء فقط'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-center gap-2 bg-teal-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[3]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.3') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال الرابع -->
                <div class="question">
                    <p>السؤال الرابع</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        ما هو الإهتزاز الذي يحدث لصخور الأرض:
                    </label>
                    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.4.البراكين' => 'البراكين',
                            'answers.4.العواصف' => 'العواصف',
                            'answers.4.الزلزال' => 'الزلزال'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[4]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.4') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال الخامس -->
                <div class="question">
                    <p>السؤال الخامس</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        الطاقة الشمسية و الرياح:
                    </label>
                    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.5.تنفذ' => 'تنفذ',
                            'answers.5.موارد طاقة غير متجددة' => 'موارد طاقة غير متجددة',
                            'answers.5.موارد طاقة متجددة' => 'موارد طاقة متجددة',
                            'answers.5.تلوث البيئة' => 'تلوث البيئة'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-pink-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[5]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.5') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال السادس -->
                <div class="question">
                    <p>السؤال السادس</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        يحفر الناس حفر عميقة للوصول إلى ..................... تسمى الآبار:
                    </label>
                    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.6.موارد الأرض' => 'موارد الأرض',
                            'answers.6.المياه الجوفية' => 'المياه الجوفية',
                            'answers.6.الري' => 'الري'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[6]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.6') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال السابع -->
                <div class="question">
                    <p>السؤال السابع</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        مصدر المياه المالحة على كوكب الأرض هو:
                    </label>
                    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.7.البحيرات' => 'البحيرات',
                            'answers.7.الينابيع' => 'الينابيع'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[7]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.7') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال الثامن -->
                <div class="question">
                    <p>السؤال الثامن</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        تستخدم الأحافير لـ؟
                    </label>
                    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.8.ترتيب الأحداث الجيولوجية' => 'ترتيب الأحداث الجيولوجية',
                            'answers.8.تنقيب عن النفط' => 'تنقيب عن النفط',
                            'answers.8.جميع ما ذكر' => 'جميع ما ذكر',
                            'answers.8.معرفة أعمار الصخور' => 'معرفة أعمار الصخور'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-teal-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[8]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.8') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال التاسع -->
                <div class="question">
                    <p>السؤال التاسع</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        النفط والفحم الحجري يعدان من؟
                    </label>
                    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.9.الوقود الأحفوري' => 'الوقود الأحفوري',
                            'answers.9.الطاقة المتجددة' => 'الطاقة المتجددة',
                            'answers.9.أصدقاء البيئة' => 'أصدقاء البيئة'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-orange-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[9]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.9') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال العاشر -->
                <div class="question">
                    <p>السؤال العاشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        هي معالم طبيعية لسطح الأرض:
                    </label>
                    <div class="radio-group grid grid-cols-3 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.10.التضاريس' => 'التضاريس',
                            'answers.10.التعرية' => 'التعرية',
                            'answers.10.الغلاف الجوي' => 'الغلاف الجوي'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[10]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.10') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- السؤال الحادي عشر -->
                <div class="question">
                    <p>السؤال الحادي عشر</p>
                    <label class="mb-4 block text-lg font-semibold text-gray-700">
                        يعتبر المرجان مثالا للكائنات الحية:
                    </label>
                    <div class="radio-group grid grid-cols-2 gap-4 px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
                        @foreach([
                            'answers.11.صواب' => 'صواب',
                            'answers.11.خطأ' => 'خطأ'
                        ] as $name => $label)
                            <label class="radio-item flex items-center justify-start gap-2 bg-blue-500 text-white p-4 rounded-lg">
                                <input type="radio" name="answers[11]" value="{{ explode('.', $name)[2] }}"
                                    {{ old('answers.11') == explode('.', $name)[2] ? 'checked' : '' }}>
                                <span>{{ $label }}</span>
                            </label>
                        @endforeach
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

    </div>
    </div>

    <script>
       // Timer Functionality with localStorage
       const timerElement = document.getElementById('timer');
        const timerInput = document.getElementById('scienceTimer');

        let timeRemaining = parseInt(localStorage.getItem('timeRemainingScience')) || 25 * 60; // 15 minutes in seconds

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
            localStorage.setItem('timeRemainingScience', timeRemaining);

            // If time runs out, clear the interval and submit the form
            if (timeRemaining <= 0) {
                clearInterval(timerInterval);
                localStorage.removeItem('timeRemainingScience'); // Clear the timer from localStorage
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
