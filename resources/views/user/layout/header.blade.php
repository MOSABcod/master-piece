<!DOCTYPE html>
<html lang="ar" dir ="rtl">

<head>
    <meta charset="utf-8">
    <title>مدرسةالتميز النموذجية</title>
    <link rel="icon" type="image/png" href="{{ asset('assets1/img/teddy-bear.png') }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    {{-- <link rel ="icon" type="image/png" herf="{{ asset('assets1/img/teddy-bear.png')}}" > --}}
    <base href="{{ url('/') }}/" target="_self">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&family=Tajawal&family=Reem+Kufi&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- أحدث نسخة من Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    

    <!-- Flaticon Font -->
    <link href="{{asset('assets1/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    


    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets1/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets1/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets1/css/style.css')}}" rel="stylesheet">
</head>
<body >
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">التميز النموذجية</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mr-4">
                    <a href="/" class="btn btn-primary px-4 mx-3 mt-3 mb-3"style="font-family: 'Tajawal'">الرئيسية</a>
                    <a href="#exams"class="btn btn-primary px-4 mx-3 mt-3 mb-3"style="font-family: 'Tajawal'">أختباراتنا</a>
                    <a href="#about" class="btn btn-primary px-4 mx-3 mt-3 mb-3"style="font-family: 'Tajawal'">مدرستنا</a>
                    <a href="#strategies"  class="btn btn-primary px-4 mx-3 mt-3 mb-3"style="font-family: 'Tajawal'">الأسترتيجيات</a>
                    <a href="#teachers" class="btn btn-primary px-4 mx-3 mt-3 mb-3"style="font-family: 'Tajawal'">معلمونا</a>
                </div>
                
                @if (Auth::user())
                    <a href="{{ route('studentProfile') }}" class="btn btn-primary px-4 mt-3 mb-3 mr-5" style="font-family: 'Tajawal'">صفحتي الشخصية</a>
                    <form action="{{ route('logout') }}" method="POST" class="nav-item nav-link p-0">
                        @csrf
                        <button type="submit" class="btn btn-primary px-4 mt-3 mb-3 mr-5" style="font-family: 'Tajawal'">
                            <i class="fa fa-sign-out-alt me-2" style="margin-left: 6px"></i>تسجيل خروج
                        </button>
                    </form>
                
                @else
                <a href="/login" class="btn btn-primary px-4 "style="font-family: 'Tajawal'">تسجيل دخول</a>
                @endif
            
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets1/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('assets1/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets1/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets1/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('assets1/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('assets1/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets1/js/main.js')}}"></script>
</body>

</html>

{{-- <!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدرسة زبدا الثانوية</title>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/dashborad logo.png') }}">

    <base href="{{ url('/') }}/" target="_self">

    <!-- plugins & libraries css -->
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/all.min.css">
    <link rel="stylesheet" href="assets/vendor/slim-select/slimselect.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- tailwind css -->
    <link rel="stylesheet" href="src/output.css">

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            direction: rtl;
        }

        /* Ensure mobile nav links are black */
        .ed-header-nav-in-mobile ul li a {
            color: black !important;
        }

        .ed-sidebar {
            direction: ltr;
        }

        /* Always display nav links on larger screens */
        @media (min-width: 1024px) {
            .to-go-to-sidebar-in-mobile {
                display: flex !important;
                /* Ensure flex layout */
                visibility: visible !important;
                /* Ensure visibility */
                opacity: 1 !important;
                /* Remove any fading effects */
                pointer-events: auto !important;
                /* Allow interaction */
            }

            .ed-header-nav {
                flex-direction: row;
                /* Ensure horizontal layout */
                gap: 30px;
                /* Adjust spacing */
            }
        }

        .ed-sidebar-heading .logo {
            text-align: right;
        }

        .ed-sidebar-heading .logo img {
            margin-left: auto;
            margin-right: 0;
        }

        .ed-header-nav li {
            text-align: right;
        }

        .ed-sidebar-heading .logo {
            flex-direction: row-reverse;
            /* Reverse the order for RTL */
            text-align: right;
        }

        .ed-sidebar-heading .ed-sidebar-close-btn {
            margin-left: 0;
            margin-right: auto;
            /* Push the close button to the left */
        }
    </style>
</head>

<body>


    <div class="ed-overlay group">
        <div
            class="fixed inset-0 z-[100] group-[.active]:bg-edblue/80 duration-[400ms] pointer-events-none group-[.active]:pointer-events-auto">
        </div>
    </div>

    <!-- sidebar -->
    <div class="ed-sidebar">
        <div
            class="translate-x-[100%] transition-transform ease-linear duration-300 fixed right-0 w-full max-w-[25%] xl:max-w-[30%] lg:max-w-[40%] md:max-w-[50%] sm:max-w-[60%] xxs:max-w-full bg-white h-full z-[999] overflow-auto">
            <!-- heading -->
            <div class="ed-sidebar-heading p-[20px] lg:p-[20px] border-b border-edgray/20">
                <div class="logo flex justify-between items-center">
                    <a href="{{ route('homepage') }}"><img src="{{ asset('assets/img/dashborad logo.png') }}"
                            alt="logo"></a>

                    <button type="button"
                        class="ed-sidebar-close-btn border border-edgray/20 w-[45px] aspect-square shrink-0 text-black text-[22px] rounded-full hover:text-edpurple"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
            </div>

            <!-- mobile menu -->
            <div class="ed-header-nav-in-mobile"></div>
        </div>
    </div>

    <!-- HEADER SECTION START -->
    <header style="background-color: #17a2b8"
        class=" ed-header--2 relative z-[2] px-[7.9%] xxxxl:px-[6.5%] xxxl:px-[1%] lg:px-[15px] py-[25px] xxs:py-[16px] flex items-center justify-between">
        <div class="logo xxs:max-w-[60%] flex flex-row items-center" style="gap:20px">
            <a href="{{ route('homepage') }}"><img src="assets/img/logo 05 (1).jpeg" style="height: 74px;"
                    alt="logo" class="logo">
            </a>
            <span style="display: flex; flex-wrap:wrap">

                <p style="color: white; font-size:24px; font-weight:bold">منصة زبدا لدعم التعليم المبكر </p>
                {{-- <p  style="color: white; font-size:18px; font-weight:bold">مدرسة زبدا الثانوية</p> --}}

            {{-- </span>

        </div>

        <div style="margin-left: 20px" class="flex  lg:items-center lg:gap-[30px]">
            <div class="flex lg:flex-col items-center gap-[60px] xxl:gap-[25px] xl:gap-[30px] md:gap-y-[15px]">

                <!-- nav -->
                <ul
                    class="to-go-to-sidebar-in-mobile ed-header-nav flex lg:flex-col gap-x-[43px] xxl:gap-x-[33px] font-kanit text-[17px] font-normal">

                    <li><a style="color: white; font-size:24px; font-weight:bold"
                            href="{{ route('homepage') }}">الرئيسية</a></li>
                    @if (Auth::user() && Auth::user()->role == 'student')
                        <li><a style="color: white; font-size:24px; font-weight:bold"
                                href="{{ route('studentProfile') }}">صفحتي الشخصية</a></li>
                    @endif
                    @if (Auth::user())
                        <form action="{{ route('logout') }}" method="POST" class="nav-item nav-link p-0">
                            @csrf
                            <button type="submit" class="btn btn-link text-decoration-none text-dark w-100 text-end">
                                <li><a style="color: white; font-size:24px; font-weight:bold">تسجيل خروج</a></li>
                            </button>
                        </form>
                    @else
                        <li><a style="color: white; font-size:24px; font-weight:bold" href="{{ route('login') }}">تسجيل
                                دخول</a></li>
                    @endif

                </ul>
            </div>

            <!-- mobile menu button -->
            <button type="button"
                class="ed-mobile-menu-open-btn hidden lg:inline-block text-white text-[18px] hover:text-edyellow"><i
                    class="fa-solid fa-bars"></i></button>
        </div>
    </header>
 --}}
