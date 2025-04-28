

<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-container">
                <div class="login-header">
                    <h2>أهلا بعودتك</h2>
                    <p>الرجاء تسجيل الدخول الى حسابك</p>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="national_id" style="text-align: right; display: block;">الرقم الوطني</label>
                                                <input  id="national_id" type="number" class="form-control @error('national_id') is-invalid @enderror" name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus placeholder="الرقم الوطني" style="direction:rtl; text-align:right;">
                        @error('national_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password" style="text-align: right; display: block;">كلمة المرور</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="أدخل كلمة المرور" style="direction:rtl; text-align:right;">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="mx-2" for="remember">تذكرني  </label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btnn-primary">تسجيل الدخول</button>
                </form>
                
                <div class="separator">
                    <span>أو</span>
                </div>
                
                <div class="footer-link">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">نسيت كلمة المرور؟</a>
                    @endif
                </div>
                
                {{-- <div class="footer-link">
                    <p>ليس لديك حساب؟ <a href="{{ route('register') }}">سجل الآن</a></p>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('styles')
<style>
    body {
    
        direction: rtl
    }
    .login-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        padding: 40px;
        width: 100%;
        margin: 40px 0;
    }
    
    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }
    
    .login-header h2 {
        color: #17a2b8;
        font-weight: 700;
        margin-bottom: 10px;
    }
    
    .form-group {
        margin-bottom: 20px;
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
    
    .remember-me {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .remember-me input {
        margin-right: 8px;
    }
</style>
@endsection
