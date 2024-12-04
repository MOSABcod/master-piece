@extends('user.layout.mainlayout')

@section('content')
<style>
    .result-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: #f3f4f6;
    }

    .result-container {
        text-align: center;
        width: 100%;
        max-width: 600px;
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 15px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
        padding: 40px;
    }

    .result-heading {
        font-size: 2.5rem;
        font-weight: bold;
        color: #374151;
        margin-bottom: 20px;
    }

    .result-value {
        font-size: 4rem;
        font-weight: bold;
        color: #3b82f6;
        margin-bottom: 20px;
    }

    .result-description {
        font-size: 1.2rem;
        color: #6b7280;
        margin-bottom: 30px;
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
        width: 50%
    }

    .exit:hover {
        background-color: #dc2626;
    }
</style>

<div class="result-wrapper">
    <div class="result-container">
        <h1 class="result-heading">النتيجة النهائية</h1>
        <p class="result-value">{{ session('result') ? session('result'): 0 }}/{{ session('countofqus')?session('countofqus') :0 }}</p>
        <p class="result-description">تهانينا! لقد أتممت الاختبار بنجاح.</p>
        <div class="action-buttons">
            <a href="{{ route('homepage') }}" class="exit">خروج</a>
        </div>
    </div>
</div>

@endsection
