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

            <form id="questions-form" >
                @csrf
                <h1>ورقة عمل</h1>

                <!-- Question 1 -->
                <div class="question active">
                    <p>السؤال الأول</p>
                    <label>اختر العدد (اثنان).</label>
                    <div class="radio-group">
                        <label><input type="radio" name="answers[1]" value="1"> 1</label>
                        <label><input type="radio" name="answers[1]" value="2"> 2</label>
                        <label><input type="radio" name="answers[1]" value="3"> 3</label>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="question">
                    <p>السؤال الثاني</p>
                    <label>اختر العدد (سبعة).</label>
                    <div class="radio-group">
                        <label><input type="radio" name="answers[2]" value="5"> 5</label>
                        <label><input type="radio" name="answers[2]" value="7"> 7</label>
                        <label><input type="radio" name="answers[2]" value="8"> 8</label>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="question">
                    <p>السؤال الثالث</p>
                    <label>بداية أحمد 4 قطع شوكولاتة، إذا قُسمت كل قطعة إلى نصفين، كم قطعة شوكولاتة سيتناول كل منهما؟</label>
                    <input type="number" name="answers[3]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 4 -->
                <div class="question">
                    <p>السؤال الرابع</p>
                    <label>اشترى سالم 5 بالونات، إذا طار منها بالونان، كم بالونًا بقي معه؟</label>
                    <input type="number" name="answers[4]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 5 -->
                <div class="question">
                    <p>السؤال الخامس</p>
                    <label>ما هو العدد الأكبر؟</label>
                    <div class="radio-group">
                        <label><input type="radio" name="answers[5]" value="3"> العدد ثلاثة</label>
                        <label><input type="radio" name="answers[5]" value="5"> العدد خمسة</label>
                        <label><input type="radio" name="answers[5]" value="7"> العدد سبعة</label>
                        <label><input type="radio" name="answers[5]" value="9"> العدد تسعة</label>
                    </div>
                </div>

                <!-- Question 6 -->
                <div class="question">
                    <p>السؤال السادس</p>
                    <label>اختر المجموعة الأكثر.</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="answers[6]" value="group1">
                            <span class="stars">⭐⭐⭐</span>
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="answers[6]" value="group2">
                            <span class="stars">⭐⭐⭐⭐⭐</span>
                        </label>
                    </div>
                </div>

                <!-- Question 7 -->
                <div class="question">
                    <p>السؤال السابع</p>
                    <label>اختر المجموعة الأقل.</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="answers[7]" value="group1">
                            <span class="stars">⭐</span>
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="answers[7]" value="group2">
                            <span class="stars">⭐⭐⭐</span>
                        </label>
                    </div>
                </div>

                <!-- Question 8 -->
                <div class="question">
                    <p>السؤال الثامن</p>
                    <label>اختر المجموعة الأقل.</label>
                    <div class="radio-group">
                        <label class="radio-item">
                            <input type="radio" name="answers[8]" value="group1">
                            <span class="stars">⭐⭐⭐⭐</span><br>
                            <span class="stars" style="margin-right:29px">⭐⭐⭐⭐</span>
                        </label>
                        <label class="radio-item">
                            <input type="radio" name="answers[8]" value="group2">
                            <span class="stars">⭐⭐⭐</span><br>
                            <span class="stars" style="margin-right:29px">⭐⭐⭐</span>
                        </label>
                    </div>
                </div>

                <!-- Question 9 -->
                <div class="question">
                    <p>السؤال التاسع</p>
                    <label>اختر العدد الأكبر؟</label>
                    <div class="radio-group">
                        <label><input type="radio" name="answers[9]" value="6"> 6</label>
                        <label><input type="radio" name="answers[9]" value="7"> 7</label>
                        <label><input type="radio" name="answers[9]" value="9"> 9</label>
                    </div>
                </div>

                <!-- Question 10 -->
                <div class="question">
                    <p>السؤال العاشر</p>
                    <label>اختر العدد الأصغر؟</label>
                    <div class="radio-group">
                        <label><input type="radio" name="answers[10]" value="11"> 11</label>
                        <label><input type="radio" name="answers[10]" value="7"> 7</label>
                        <label><input type="radio" name="answers[10]" value="4"> 4</label>
                    </div>
                </div>

                <!-- Question 11 -->
                <div class="question">
                    <p>السؤال الحادي عشر</p>
                    <label>مع محمد 9 تفاحات (🍎)، أراد أن يضع كل 3 تفاحات (🍎) في كيس، كم كيسًا يحتاج؟</label>
                    <input type="number" name="answers[11]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 12 -->
                <div class="question">
                    <p>السؤال الثاني عشر</p>
                    <label>اشترى محمد 4 دفاتر (📕) وأعطاه عمه 6 دفاتر (📕) أخرى، كم دفترًا أصبح مع محمد؟</label>
                    <input type="number" name="answers[12]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 13 -->
                <div class="question">
                    <p>السؤال الثالث عشر</p>
                    <label>ما عدد النجوم (⭐)؟ ضع دائرة حول العدد المناسب.</label>
                    <div class="radio-group">
                        <label><input type="radio" name="answers[13]" value="22"> 22</label>
                        <label><input type="radio" name="answers[13]" value="21"> 21</label>
                        <label><input type="radio" name="answers[13]" value="15"> 15</label>
                    </div>
                </div>

                <!-- Question 14 -->
                <div class="question">
                    <p>السؤال الرابع عشر</p>
                    <label>اكتب في المربع ما يتبقى عندما تأخذ 4 من 9.</label>
                    <input type="number" name="answers[14]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 15 -->
                <div class="question">
                    <p>السؤال الخامس عشر</p>
                    <label>اكتب العدد الذي إذا أضفنا له 2 يصبح لدينا 5.</label>
                    <input type="number" name="answers[15]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 16 -->
                <div class="question">
                    <p>السؤال السادس عشر</p>
                    <label>اكتب العدد الذي إذا طرحناه من 8 يصبح لدينا 6.</label>
                    <input type="number" name="answers[16]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 17 -->
                <div class="question">
                    <p>السؤال السابع عشر</p>
                    <label>اكتب الناتج عند إضافة 2 إلى 7.</label>
                    <input type="number" name="answers[17]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Question 18 -->
                <div class="question">
                    <p>السؤال الثامن عشر</p>
                    <label>اكتب العدد الذي إذا أضفناه إلى 16 يصبح الناتج 20.</label>
                    <input type="number" name="answers[18]" class="answer" placeholder="أدخل الإجابة">
                </div>

                <!-- Navigation Buttons -->
                <div class="navigation-buttons">
                    <button id="prev" class="prev" type="button" disabled>السابق</button>
                    <button id="next" class="next" type="button">التالي</button>
                    <button type="button" id="submit-btn">إرسال</button>
                </div>
            </form>
        </div>
    </div>


    <script>

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
document.getElementById('submit-btn').addEventListener('click', async function () {
        const form = document.getElementById('questions-form');
        const formData = new FormData(form);

        // Convert FormData to JSON
        const answers = {};
        formData.forEach((value, key) => {
            const match = key.match(/answers\[(\d+)\]/); // Extract question ID
            if (match) {
                answers[match[1]] = value;
            }
        });

        // Send data to the API
        try {
            const response = await fetch('/api/saveAnswer', {
                method: 'POST', // Ensure this matches the route definition
                headers: {
                    'Content-Type': 'application/json',
                    // 'X-CSRF-TOKEN': csrfToken,

                    // If using authentication tokens, include it here:
                    // 'Authorization': 'Bearer YOUR_ACCESS_TOKEN',
                },
                body: JSON.stringify({ answers }),
            });

            const result = await response.json();

            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'نجاح!',
                    text: result.message,
                    confirmButtonText: 'موافق'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ!',
                    html: result.errors ? result.errors.join('<br>') : result.message,
                    confirmButtonText: 'موافق'
                });
            }
        } catch (error) {
            Swal.fire({
                icon: 'error',
                title: 'خطأ!',
                text: 'حدث خطأ أثناء إرسال الإجابات. يرجى المحاولة مرة أخرى.',
                confirmButtonText: 'موافق'
            });
            console.error('Error:', error);
        }
    });
    </script>
</body>

</html>
@endsection
