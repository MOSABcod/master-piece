<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edutics</title>
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">
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

        .ed-sidebar {
            direction: ltr;
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
                    <a href="index.html"><img src="assets/img/logo 05 (1).jpeg" alt="logo"></a>

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
    <header style="background-color: #27703b "
        class=" ed-header--2 relative z-[2] px-[7.9%] xxxxl:px-[6.5%] xxxl:px-[1%] lg:px-[15px] py-[25px] xxs:py-[16px] flex items-center justify-between">
        <div class="logo xxs:max-w-[60%] flex flex-row items-center" style="gap:20px">
            <a href="index.html"><img src="assets/img/logo 05 (1).jpeg" style="height: 74px;" alt="logo"
                    class="logo">
            </a>
            <span style="display: flex; flex-wrap:wrap">

                <p style="color: white" >وزارة التربية والتعليم -</p>
                <p  style="color: white">مدرسة زبدا الثانوية</p>

            </span>

        </div>

        <div style="margin-left: 20px" class="flex  lg:items-center lg:gap-[30px]">
            <div class="flex lg:flex-col items-center gap-[60px] xxl:gap-[25px] xl:gap-[30px] md:gap-y-[15px]">

                <!-- nav -->
                <ul
                    class="to-go-to-sidebar-in-mobile ed-header-nav flex lg:flex-col gap-x-[43px] xxl:gap-x-[33px] font-kanit text-[17px] font-normal">
                

                    <li><a href="about.html">من نحن</a></li>

                    <li><a href="index.html">الرئيسيه</a></li>

                </ul>
            </div>

            <!-- mobile menu button -->
            <button type="button"
                class="ed-mobile-menu-open-btn hidden lg:inline-block text-white text-[18px] hover:text-edyellow"><i
                    class="fa-solid fa-bars"></i></button>
        </div>
    </header>
    <!-- HEADER SECTION END -->
</body>

</html>
