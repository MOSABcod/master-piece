@extends('user.layout.mainlayout')

@section('content')
<style>
    .timeout-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f3f4f6;
    }

    .timeout-container {
        text-align: center;
        width: 100%;
        max-width: 600px;
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 15px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        padding: 40px;
    }

    .timeout-heading {
        font-size: 2.5rem;
        font-weight: bold;
        color: #ef4444;
        margin-bottom: 20px;
    }

    .timeout-message {
        font-size: 1.5rem;
        color: #6b7280;
        margin-bottom: 30px;
    }

    .timeout-description {
        font-size: 1.2rem;
        color: #374151;
        margin-bottom: 40px;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .action-buttons button, .action-buttons a {
        padding: 12px 20px;
        font-size: 1rem;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-decoration: none; /* Remove underline for links */
    }

    .restart {
        background-color: #3b82f6;
        color: white;
    }

    .restart:hover {
        background-color: #2563eb;
    }

    .exit {
        background-color: #ef4444;
        color: white;
    }

    .exit:hover {
        background-color: #dc2626;
    }
</style>

<div class="timeout-wrapper">
    <div class="timeout-container">
        <h1 class="timeout-heading">انتهى الوقت</h1>
        <p class="timeout-message">عذرًا، لقد نفذ الوقت المخصص لهذه الورقة.</p>
        <p class="timeout-description">يمكنك المحاولة مرة أخرى أو العودة إلى لوحة التحكم.</p>
        <div class="action-buttons">
            <a href="" class="restart">إعادة المحاولة</a>
            <a href="{{ route('homepage') }}" class="exit">خروج</a>
        </div>
    </div>
</div>

@endsection
