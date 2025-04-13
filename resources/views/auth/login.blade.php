

<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-container">
                <div class="login-header">
                    <h2>!أهلا بعودتك</h2>
                    <p>Please login to your account</p>
                </div>
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label style="direction:rtl" for="email">البريد الإلكتروني</label>
                        <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="البريد الإلكتروني" style="direction:rtl; text-align:right;">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password" style="direction:rtl">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="remember-me">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember me</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btnn-primary">Login</button>
                </form>
                
                <div class="separator">
                    <span>or</span>
                </div>
                
                <div class="footer-link">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                </div>
                
                <div class="footer-link">
                    <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                </div>
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
