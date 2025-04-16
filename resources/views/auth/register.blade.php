{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- National ID -->
        <div class="mt-4">
            <x-input-label for="national_id" :value="__('National ID')" />
            <x-text-input id="national_id" class="block mt-1 w-full" type="text" name="national_id" :value="old('national_id')" required maxlength="10" />
            <x-input-error :messages="$errors->get('national_id')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" class="block mt-1 w-full" name="role" required>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>{{ __('Student') }}</option>
                <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>{{ __('Teacher') }}</option>
                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>{{ __('Manager') }}</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ implode(' ', $errors->all()) }}',
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: '{{ session('error') }}',
        });
    </script>
    @endif
</x-guest-layout> --}}


<!-- resources/views/auth/register.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="register-container">
                <div class="register-header">
                    <h2>إنشاء حساب جديد</h2>
                    <p style="font-family: 'Tajawal'">املأ النموذج  أدناه للبدء</p>
                </div>
                
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf   
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label style="text-align: right; display: block;" for="name">الأسم الكامل</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="أدخل أسمك الكامل"style="direction:rtl">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label style="text-align: right; display: block;" for="national_id">الرقم الوطني</label>
                        <input  id="national_id" type="number" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" placeholder=" أدخل رقمك الوطني"style="direction:rtl">
                        @error('national_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label style="text-align: right; display: block;" for="password">كلمة المرور</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="أختر كلمة المرور"style="direction:rtl">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label style="text-align: right; display: block;" for="password-confirm">تأكيد كلمة المرور</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="أعد كتابة كلمة المرور"style="direction:rtl">
                    </div>
                    
                    <div class="form-group">
                        <label style="text-align: right; display: block;" for="role">الدور</label>
                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required style="direction: rtl">
                            <option value="" disabled selected>اختر دورك</option>
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>طالب</option>
                            <option value="teacher" {{ old('role') == 'teacher' ? 'selected' : '' }}>استاذ</option>
                            <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>مدير</option>
                        </select>
                        @error('role')
                            <span class="invalid-feedback" role="alert" style="display: block; text-align: right;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary btnn-primary">تسجيل</button>
                    
                    <div class="terms">
                        بمجرد التسجيل، فإنك توافق على <a href="#">شروط الخدمة</a> و <a href="#">سياسة الخصوصية</a>
                    </div>
                </form>
                
                <div class="separator">
                    <span>أو</span>
                </div>
                
                <div class="footer-link">
                    <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>

    body {
        direction: rtl;
    }
    .register-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        margin: 40px 0;
    }
    
    .register-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .register-header h2 {
        color: #17a2b8;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .form-row {
        display: flex;
        margin-right: -10px;
        margin-left: -10px;
    }
    
    .form-group {
        margin-bottom: 20px;
        padding-right: 10px;
        padding-left: 10px;
        flex: 1;
    }
    
    .form-control {
        padding: 12px 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: "Nunito", sans-serif;
        font-size: 1rem;
        transition: border-color 0.3s;
    }
    
    .form-control:focus {
        border-color: #17a2b8;
        outline: none;
        box-shadow: none;
    }
    
    .invalid-feedback {
        display: block;
        width: 100%;
        margin-top: 0.25rem;
        font-size: 80%;
        color: #dc3545;
    }

    .is-invalid {
    border-color: #dc3545 !important;
}

    
    .btn {
        font-weight: 600;
        padding: 12px 30px;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: 5px;
        transition: all 0.2s;
    }
    
    .btnn-primary {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
        width: 100%;
    }
    
    .btn-primary:hover {
        background-color: #138496;
        border-color: #117a8b;
    }
    
    .separator {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 20px 0;
    }
    
    .separator::before,
    .separator::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #ddd;
    }
    
    .separator span {
        padding: 0 10px;
        color: #888;
    }
    
    .footer-link {
        text-align: center;
        margin-top: 20px;
    }
    
    .footer-link a {
        color: #17a2b8;
        text-decoration: none;
    }
    
    .footer-link a:hover {
        text-decoration: underline;
    }
    
    .terms {
        font-size: 0.85rem;
        text-align: center;
        margin-top: 20px;
        color: #888;
    }
    
    .terms a {
        color: #17a2b8;
    }
    
    @media (max-width: 767.98px) {
        .form-row {
            flex-direction: column;
        }
    }
</style>
@endsection
