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
            <form id="questions-form" method="POST" action="{{ route('save.ar.first') }}">
                @csrf
 <!-- السؤال الأول -->
 <!-- Hidden input to store the remaining time -->
 <input type="hidden" name="timer" id="arFirstTimer" > <!-- 15 minutes in seconds -->
<!-- Timer Input -->
<input type="hidden" name="timer" >

<!-- السؤال الأول -->
<div class="question">
    <p>السؤال الأول</p>
    <label class="mb-2 block text-lg font-semibold text-gray-700">
        حدد موقع المقطع الصوتي (عُ) في كلمة (شارعُ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[1]" value="first" {{ old('answers.1') == 'first' ? 'checked' : '' }}>
            <span>أول</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[1]" value="middle" {{ old('answers.1') == 'middle' ? 'checked' : '' }}>
            <span>وسط</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[1]" value="last" {{ old('answers.1') == 'last' ? 'checked' : '' }}>
            <span>آخر</span>
        </label>
    </div>
</div>

<!-- السؤال الثاني -->
<div class="question">
    <p>السؤال الثاني</p>
    <label class="mb-2 block text-lg font-semibold text-gray-700">
        حدد موقع المقطع الصوتي (جَ) في كلمة (جَبَلُ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[2]" value="first" {{ old('answers.2') == 'first' ? 'checked' : '' }}>
            <span>أول</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[2]" value="middle" {{ old('answers.2') == 'middle' ? 'checked' : '' }}>
            <span>وسط</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[2]" value="last" {{ old('answers.2') == 'last' ? 'checked' : '' }}>
            <span>آخر</span>
        </label>
    </div>
</div>

<!-- السؤال الثالث -->
<div class="question">
    <p>السؤال الثالث</p>
    <label class="mb-2 block text-lg font-semibold text-gray-700">
        حدد موقع المقطع الصوتي (ط) في كلمة (مَطَر).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[3]" value="first" {{ old('answers.3') == 'first' ? 'checked' : '' }}>
            <span>أول</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[3]" value="middle" {{ old('answers.3') == 'middle' ? 'checked' : '' }}>
            <span>وسط</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[3]" value="last" {{ old('answers.3') == 'last' ? 'checked' : '' }}>
            <span>آخر</span>
        </label>
    </div>
</div>

<!-- السؤال الرابع -->
<div class="question">
    <p>السؤال الرابع</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الصورة المناسبة عند تركيب المقاطع الصوتية (جَـ مَـ ل).
    </label>
    <div class="radio-group grid grid-cols-1 gap-4 border border-gray-300 p-4 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-4 cursor-pointer">
            <input type="radio" name="answers[4]" value="camel" {{ old('answers.4') == 'camel' ? 'checked' : '' }}>
            <img src="{{ asset('quiz images/1.1.png') }}" alt="Camel" class="w-24 h-24 rounded-md border border-gray-200">
        </label>
        <label class="radio-item flex items-center gap-4 cursor-pointer">
            <input type="radio" name="answers[4]" value="rope" {{ old('answers.4') == 'rope' ? 'checked' : '' }}>
            <img src="{{ asset('quiz images/1.2.png') }}" alt="Rope" class="w-24 h-24 rounded-md border border-gray-200">
        </label>
        <label class="radio-item flex items-center gap-4 cursor-pointer">
            <input type="radio" name="answers[4]" value="mountain" {{ old('answers.4') == 'mountain' ? 'checked' : '' }}>
            <img src="{{ asset('quiz images/1.3.png') }}" alt="Mountain" class="w-24 h-24 rounded-md border border-gray-200">
        </label>
    </div>
</div>

<!-- السؤال الخامس -->
<div class="question">
    <p>السؤال الخامس</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الصورة المناسبة عند حذف المقطع الصوتي الأول من كلمة (مَـنار) لتصبح (نار).
    </label>
    <div class="radio-group grid grid-cols-3 gap-4 border border-gray-300 p-4 rounded-md bg-gray-100">
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="house" {{ old('answers.5') == 'house' ? 'checked' : '' }}>
            <img src="{{ asset('quiz images/2.3.png') }}" alt="House" class="w-24 h-24 rounded-md border border-gray-200">
        </label>
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="mouse" {{ old('answers.5') == 'mouse' ? 'checked' : '' }}>
            <img src="{{ asset('quiz images/2.2.png') }}" alt="Mouse" class="w-24 h-24 rounded-md border border-gray-200">
        </label>
        <label class="radio-item flex flex-col items-center gap-2 cursor-pointer">
            <input type="radio" name="answers[5]" value="fire" {{ old('answers.5') == 'fire' ? 'checked' : '' }}>
            <img src="{{ asset('quiz images/2.1.png') }}" alt="Fire" class="w-24 h-24 rounded-md border border-gray-200">
        </label>
    </div>
</div>

<!-- السؤال السادس -->
<div class="question">
    <p>السؤال السادس</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        كم مقطعًا صوتيًا نسمع عند تحليل كلمة (عَلَمُ)؟
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[6]" value="2" {{ old('answers.6') == '2' ? 'checked' : '' }}>
            <span>٢</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[6]" value="3" {{ old('answers.6') == '3' ? 'checked' : '' }}>
            <span>٣</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[6]" value="4" {{ old('answers.6') == '4' ? 'checked' : '' }}>
            <span>٤</span>
        </label>
    </div>
</div>

<!-- السؤال السابع -->
<div class="question">
    <p>السؤال السابع</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة التي تتكون من المقاطع الآتية (جَ رَ سُ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[7]" value="جرس" {{ old('answers.7') == 'جرس' ? 'checked' : '' }}>
            <span>جَرَسُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[7]" value="سرح" {{ old('answers.7') == 'سرح' ? 'checked' : '' }}>
            <span>سَرَحْ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[7]" value="حرس" {{ old('answers.7') == 'حرس' ? 'checked' : '' }}>
            <span>حَرَسْ</span>
        </label>
    </div>
</div>

<!-- السؤال الثامن -->
<div class="question">
    <p>السؤال الثامن</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول التحليل الصحيح لكلمة (مَـجْـلِـسُ).
    </label>
    <div class="radio-group flex justify-around items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[8]" value="مَـ، جْـ، لِـسُ" {{ old('answers.8') == 'مَـ، جْـ، لِـسُ' ? 'checked' : '' }}>
            <span>مَـ، جْـ، لِـسُ</span>
        </label>
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[8]" value="مَـجَـ، لَـ، سُ" {{ old('answers.8') == 'مَـجَـ، لَـ، سُ' ? 'checked' : '' }}>
            <span>مَـجَـ، لَـ، سُ</span>
        </label>
        <label class="radio-item flex flex-col items-center cursor-pointer">
            <input type="radio" name="answers[8]" value="مَـجْـ، لِـسْ" {{ old('answers.8') == 'مَـجْـ، لِـسْ' ? 'checked' : '' }}>
            <span>مَـجْـ، لِـسْ</span>
        </label>
    </div>
</div>

<!-- السؤال التاسع -->
<div class="question">
    <p>السؤال التاسع</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (صِفْرُ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[9]" value="صِفْرُ" {{ old('answers.9') == 'صِفْرُ' ? 'checked' : '' }}>
            <span>صِفْرُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[9]" value="صَفْرُ" {{ old('answers.9') == 'صَفَرُ' ? 'checked' : '' }}>
            <span>صَفَرُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[9]" value="صَفيرُ" {{ old('answers.9') == 'صَفيرُ' ? 'checked' : '' }}>
            <span>صَفيرُ</span>
        </label>
    </div>
</div>

<!-- السؤال العاشر -->
<div class="question">
    <p>السؤال العاشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (زَيْدٍ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[10]" value="زَيْدُ" {{ old('answers.10') == 'زَيْدُ' ? 'checked' : '' }}>
            <span>زَيْدُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[10]" value="زَيْداً" {{ old('answers.10') == 'زَيْداً' ? 'checked' : '' }}>
            <span>زَيْداً</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[10]" value="زَيْدٍ" {{ old('answers.10') == 'زَيْدٍ' ? 'checked' : '' }}>
            <span>زَيْدٍ</span>
        </label>
    </div>
</div>

<!-- السؤال الحادي عشر -->
<div class="question">
    <p>السؤال الحادي عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول الكلمة التي تبدأ باللام القمرية (التي تُنطق) من الكلمات الآتية:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[11]" value="الْبَيْتُ" {{ old('answers.11') == 'الْبَيْتُ' ? 'checked' : '' }}>
            <span>الْبَيْتُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[11]" value="الشَّارِعُ" {{ old('answers.11') == 'الشَّارِعُ' ? 'checked' : '' }}>
            <span>الشَّارِعُ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[11]" value="النَّظَرُ" {{ old('answers.11') == 'النَّظَرُ' ? 'checked' : '' }}>
            <span>النَّظَرُ</span>
        </label>
    </div>
</div>

<!-- السؤال الثاني عشر -->
<div class="question">
    <p>السؤال الثاني عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول كلمة (دَرَّسَ).
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[12]" value="دَرَّسَ" {{ old('answers.12') == 'دَرَّسَ' ? 'checked' : '' }}>
            <span>دَرَّسَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[12]" value="دَرَسَ" {{ old('answers.12') == 'دَرَسَ' ? 'checked' : '' }}>
            <span>دَرَسَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[12]" value="دَرْسَ" {{ old('answers.12') == 'دَرْسَ' ? 'checked' : '' }}>
            <span>دَرْسَ</span>
        </label>
    </div>
</div>
<div class="question">
    <p>السؤال الثالث عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول المقطع الصوتي (م) مما يأتي:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[13]" value="م" {{ old('answers.13') == 'م' ? 'checked' : '' }}>
            <span>م</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[13]" value="مَ" {{ old('answers.13') == 'مَ' ? 'checked' : '' }}>
            <span>مَ</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[13]" value="مُ" {{ old('answers.13') == 'مُ' ? 'checked' : '' }}>
            <span>مُ</span>
        </label>
    </div>
</div>
<div class="question">
    <p>السؤال الرابع عشر</p>
    <label class="mb-4 block text-lg font-semibold text-gray-700">
        ضع دائرة حول المقطع الصوتي (با) مما يأتي:
    </label>
    <div class="radio-group flex justify-between items-center px-4 py-3 border border-gray-300 rounded-md bg-gray-100">
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[14]" value="با" {{ old('answers.14') == 'با' ? 'checked' : '' }}>
            <span>با</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[14]" value="بو" {{ old('answers.14') == 'بو' ? 'checked' : '' }}>
            <span>بو</span>
        </label>
        <label class="radio-item flex items-center gap-2">
            <input type="radio" name="answers[14]" value="بي" {{ old('answers.13') == 'بي' ? 'checked' : '' }}>
            <span>بي</span>
        </label>
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
const timerElement = document.getElementById('timer');
const timerInput = document.getElementById('arFirstTimer');


let timeRemaining = parseInt(localStorage.getItem('timeRemainingArFirst')) || 15 * 60;

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
    localStorage.setItem('timeRemainingArFirst', timeRemaining);

    // If time runs out, clear the interval and redirect
    if (timeRemaining === 0) {
        clearInterval(timerInterval);
        localStorage.removeItem('timeRemainingArFirst'); // Clear the timer from localStorage
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
