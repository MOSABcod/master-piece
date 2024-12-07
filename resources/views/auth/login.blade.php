    <style>
        /* Body Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('/path-to-your-background-image.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color: #333;
}

/* Main Login Box */
.login-container {
    background-color: white;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
    padding: 20px 30px;
    text-align: center;
}

/* Logo */
.login-container img {
    width: 60px;
    height: 60px;
    margin-bottom: 15px;
}

/* Heading */
.login-container h2 {
    font-size: 1.5rem;
    color: #27703b;
    margin-bottom: 20px;
}

/* Form Inputs */
.login-container input,
.login-container select {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.login-container input:focus,
.login-container select:focus {
    border-color: #27703b;
    outline: none;
    box-shadow: 0 0 5px rgba(39, 112, 59, 0.5);
}

/* Buttons */
.login-container button {
    width: 100%;
    background-color: #27703b;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

.login-container button:hover {
    background-color: #1e5b34;
}

/* Links */
.login-container a {
    font-size: 12px;
    color: #27703b;
    text-decoration: none;
    margin: 0 5px;
}

.login-container a:hover {
    text-decoration: underline;
}

/* Footer Links */
.login-container .footer-links {
    margin-top: 20px;
    font-size: 14px;
    color: #666;
}

    </style>
   <!DOCTYPE html>
   <html lang="ar" dir="rtl">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>تسجيل دخول</title>
       <link rel="stylesheet" href="path-to-your-styles.css">
       <link rel="icon" type="image/png" href="{{ asset('assets/img/dashborad logo.png') }}">

   </head>
   <body style="background: url({{ asset('assets/img/loginBack.jpg') }}); background-repeat: no-repeat !important ;   background-size: cover !important; background-position: center !important;">
       <div class="login-container">
           <img src="{{ asset('assets/img/dashborad logo.png') }}" alt="Logo">
           <h2>
            مدرسة زبدا الثانوية</h2>
           <form method="POST" action="/login">
            @csrf
               <input type="text" name="national_id" placeholder="اسم المستخدم" required>
               <input type="password" name="password" placeholder="كلمة المرور" required>
               {{-- <select name="language">
                   <option value="arabic">العربية</option>
                   <option value="english">English</option>
               </select> --}}
               <button type="submit">الدخول</button>
           </form>
           {{-- <div class="footer-links">
               <a href="/forgot-password">Forgot password?</a> |
               <a href="/forgot-username">Forgot username?</a>
           </div> --}}
       </div>
   </body>
   </html>

