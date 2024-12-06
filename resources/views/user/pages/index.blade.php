
@extends('user.layout.mainlayout')

@section('content')

    <main>
        <!-- BANNER SECTION START -->
        <section class="ed-2-banner bg-edoffwhite pt-[120px] pb-[190px] relative z-[1] overflow-hidden">
            <div class="container max-w-[71.6%] xxxl:max-w-[86.5%] xxl:max-w-[90.6%] mx-auto">
                <div class="flex md:flex-col gap-x-[112px] gap-y-[40px] items-center">
                    <!-- banner text -->
                    <div class="max-w-[49%] xxxl:max-w-[45.5%] md:max-w-full shrink-0">
                        <h6 class="ed-section-sub-title !text-black before:!content-none">منصة <span class="text-edpurple">تعليمية</span> مبتكرة</h6>
                        <h1 class="font-medium text-[clamp(35px,5.4vw,80px)] text-edblue tracking-tight leading-[1.12] mb-[25px]">اختبر مهاراتك مع <span class="font-bold"><span class="inline-block text-edpurple relative before:absolute before:left-0 before:top-[calc(100%-6px)] before:w-[240px] before:h-[21px] before:bg-[url('../assets/img/banner-2-title-vector.svg')]">المنصة</span> التعليمية المتطورة</span></h1>
                        <p class="text-edgray font-medium mb-[41px]">منصة تعليمية مبتكرة تتيح للطلاب اختبار مهاراتهم ومعرفة نقاط قوتهم وضعفهم من خلال اختبارات مخصصة. كما توفر خارطة طريق  للمعلمين تساعدهم على تحسين مهاراتهم وتطوير أساليبهم التعليمية بطريقة تفاعلية وعصرية. هدفنا هو تحسين العملية التعليمية وتعزيز النجاح الأكاديمي لكل من الطلاب والمعلمين.</p>
                        <div class="flex flex-wrap gap-[10px]">
                            <a href="test-student.html" class="ed-btn !bg-transparent border border-edpurple !text-edpurple hover:!bg-edpurple hover:!text-white">ابدأ الاختبار</a>
                            <a href="roadmap-teacher.html" class="ed-btn !bg-transparent border border-black !text-black hover:!bg-black hover:!text-white">اكتشف خارطة الطريق</a>
                        </div>
                    </div>


                    <!-- banner image -->
                    <div class="max-w-[51%] md:max-w-full">
                        <div class="w-max relative z-[1] flex gap-[30px] items-center">
                            <img src="assets/img/bannerright.jpg" alt="banner image" class="border-[10px] border-white rounded-[20px] max-w-[241px] aspect-[261/366]">
                            <img src="assets/img/bannerleft (2).jpg" alt="banner image" style="height: 544px !important; width:415px!important" class="rounded-[20px] ">

                            <!-- vectors -->
                            <div>
                                <div class="w-[242px] aspect-square rounded-full bg-edpurple opacity-80 blur-[110px] absolute -z-[1] bottom-0 left-[163px]"></div>
                                <img src="assets/img/banner-2-img-vector-1.svg" alt="vector" class="pointer-events-none absolute -z[1] top-[30px] -left-[35px]">
                                <img src="assets/img/banner-2-img-vector-2.svg" alt="vector" class="pointer-events-none absolute -z[1] -top-[50px] -right-[40px]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- vector -->
            <div>
                <img src="assets/img/banner-2-vector-1.svg" alt="vector" class="pointer-events-none absolute -z-[1] top-[135px] left-[38px] xxxl:hidden">
                <img src="assets/img/banner-2-vector-2.svg" alt="vector" class="pointer-events-none absolute -z-[1] bottom-0 left-0">
                <img src="assets/img/banner-2-vector-3.svg" alt="vector" class="pointer-events-none absolute -z-[1] -bottom-[8px] right-0">
            </div>
        </section>
        <!-- BANNER SECTION END -->


        <!-- CATEGORIES SECTION START -->
        <div class="ed-2-categories -mt-[98px] relative z-[2]">
            <div class="mx-[15.8%] xxxl:mx-[9.8%] xxl:mx-[3.5%] bg-white p-[40px] sm:p-[30px] xxs:p-[20px] rounded-[20px] shadow-[0_4px_25px_rgba(0,0,0,0.06)]">
                <div class="grid grid-cols-3 md:grid-cols-2 xxs:grid-cols-1 gap-[20px]">
                    <!-- single category -->
                    <a href="course-grid.html" class="border border-[#e5e5e5] rounded-[10px] py-[16px] px-[20px] flex sm:flex-col items-center sm:items-start gap-y-[15px] gap-x-[20px] hover:bg-[#F8B81F] hover:border-[#F8B81F] group">
                        <!-- icon -->
                        <div class="bg-[#F8B81F] shrink-0 w-[84px] sm:w-[64px] aspect-square rounded-full p-[14px] duration-[400ms] flex items-center justify-center group-hover:bg-white">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 2C2.9 2 2 2.9 2 4V28C2 29.1 2.9 30 4 30H28C29.1 30 30 29.1 30 28V4C30 2.9 29.1 2 28 2H4ZM8 6H24V10H8V6ZM8 14H12V18H8V14ZM14 14H18V18H14V14ZM20 14H24V18H20V14ZM8 20H12V24H8V20ZM14 20H18V24H14V20ZM20 20H24V24H20V20Z" class="fill-white group-hover:fill-[#F8B81F]" />
                            </svg>
                        </div>

                        <!-- text -->
                        <div>
                            <h5 class="font-semibold text-[20px] text-edblue duration-[400ms] group-hover:text-white">رياضيات</h5>
                        </div>
                    </a>

                    <!-- single category -->
                    <a href="course-grid.html" class="border border-[#e5e5e5] rounded-[10px] py-[16px] px-[20px] flex sm:flex-col items-center sm:items-start gap-y-[15px] gap-x-[20px] hover:bg-[#39C0FA] hover:border-[#39C0FA] group">
                        <!-- icon -->
                        <div class="bg-[#39C0FA] shrink-0 w-[84px] sm:w-[64px] aspect-square rounded-full p-[14px] duration-[400ms] flex items-center justify-center group-hover:bg-white">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 0C7.16344 0 0 7.16344 0 16C0 24.8366 7.16344 32 16 32C24.8366 32 32 24.8366 32 16C32 15.4469 31.977 14.8994 31.9314 14.3588C30.712 14.7788 29.4112 15 28 15C21.3726 15 16 9.62742 16 3C16 1.5888 16.2212 0.287952 16.6412 -0.931432C16.1006 -0.977027 15.5531 -1 15 -1C6.16344 -1 0 6.16344 0 15C0 23.8366 6.16344 31 15 31C23.8366 31 31 24.8366 31 16C31 14.8974 30.9296 13.8356 30.8882 14.0306C29.6798 14.4456 28.3901 14.6538 27.0583 14.6538C21.1145 14.6538 16.3462 9.88551 16.3462 3.94166C16.3462 2.60988 16.5544 1.32021 16.9694 0.11184C16.3214 0.0384167 15.669 0 15 0Z" class="group-hover:fill-[#39c0fa] fill-white" />
                            </svg>
                        </div>

                        <!-- text -->
                        <div>
                            <h5 class="font-semibold text-[20px] text-edblue duration-[400ms] group-hover:text-white">عربي</h5>
                        </div>
                    </a>

                    <!-- single category -->
                    <a href="course-grid.html" class="border border-[#e5e5e5] rounded-[10px] py-[16px] px-[20px] flex sm:flex-col items-center sm:items-start gap-y-[15px] gap-x-[20px] hover:bg-[#F92596] hover:border-[#F92596] group">
                        <!-- icon -->
                        <div class="bg-[#F92596] shrink-0 w-[84px] sm:w-[64px] aspect-square rounded-full p-[14px] duration-[400ms] flex items-center justify-center group-hover:bg-white">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M16.5 2C15.6716 2 15 2.67157 15 3.5V18H12C11.4477 18 11 18.4477 11 19V22H25V19C25 18.4477 24.5523 18 24 18H21V3.5C21 2.67157 20.3284 2 19.5 2H16.5Z" class="fill-white group-hover:fill-[#f92596]" />
                                    <path d="M8 23H28C28.5523 23 29 23.4477 29 24V26H7V24C7 23.4477 7.44772 23 8 23Z" class="fill-white group-hover:fill-[#f92596]" />
                                    <circle cx="18" cy="29" r="4" class="fill-white group-hover:fill-[#f92596]" />
                                </g>
                            </svg>
                        </div>

                        <!-- text -->
                        <div>
                            <h5 class="font-semibold text-[20px] text-edblue duration-[400ms] group-hover:text-white">علوم</h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <!-- CATEGORIES SECTION END -->


        <!-- COURSES SECTION START -->
        <section class="ed-2-courses py-[120px] xl:py-[80px] md:py-[60px]">
            <div class="mx-[9.2%] xxxl:mx-[8.2%] xxl:mx-[3%]">
                <!-- section heading -->
                <div class="text-center mb-[21px]">
                    <h6 class="ed-section-sub-title">الامتحانات</h6>
                    <h2 class="ed-section-title">الامتحانات</h2>
                </div>

                {{-- <div class="ed-2-courses-filter-navs flex flex-wrap justify-center gap-[10px] mb-[40px] xs:mb-[30px] pb-[30px] xs:pb-[20px] border-b border-[#002147]/15 mx-[200px] lg:mx-[100px] md:mx-[12px] *:border *:border-edpurple *:rounded-[6px] *:py-[5px] *:px-[10px] *:text-edpurple *:font-medium *:text-[14px]">
                    <button class="hover:bg-edpurple hover:text-white" data-filter="all">All</button>
                    <button class="hover:bg-edpurple hover:text-white" data-filter=".personal-skill">Personal Skill</button>
                    <button class="hover:bg-edpurple hover:text-white" data-filter=".web-dev">Web Development</button>
                    <button class="hover:bg-edpurple hover:text-white" data-filter=".ui-ux-design">UX/UI Design</button>
                    <button class="hover:bg-edpurple hover:text-white" data-filter=".data-science">Data Science</button>
                    <button class="hover:bg-edpurple hover:text-white" data-filter=".finance">Finance</button>
                </div> --}}

                <!-- course cards -->
                <div class="ed-2-courses-container grid grid-cols-4 xl:grid-cols-3 md:grid-cols-2 xs:grid-cols-1 gap-[30px] xxl:gap-[20px]">
                    @if (Auth::user() &&( Auth::user()->class_id == 1 || Auth::user()->class_id == 2 || Auth::user()->role == "teacher")  )


                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                onclick="confirmExamStart(this)"

                                data-route="{{ route('mathFirst') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user() &&(Auth::user()->class_id == 3 || Auth::user()->class_id == 4 || Auth::user()->role == "teacher")  )

                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - الصف الثاني والثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('mathSecondAndThird') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user() &&(Auth::user()->class_id == 1 || Auth::user()->class_id == 2 || Auth::user()->role == "teacher")  )

                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('arabicFirst') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user() &&(Auth::user()->class_id == 3 || Auth::user()->class_id == 4 || Auth::user()->role == "teacher")  )

                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - الصف الثاني و الصف الثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('arabicSecondAndThird') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (!Auth::user())
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                disabled
                                style="background-color: grey;
                                cursor :not-allowed"
                                title="سجل الدخول لتقديم الاختبار "
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('mathFirst') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
<div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - الصف الثاني والثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                disabled
                                style="background-color: grey;
                                cursor :not-allowed"
                                title="سجل الدخول لتقديم الاختبار "
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('mathSecondAndThird') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
<div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                disabled
                                style="background-color: grey;
                                cursor :not-allowed"
                                title="سجل الدخول لتقديم الاختبار "
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('arabicFirst') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - الصف الثاني و الصف الثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                disabled
                                style="background-color: grey;
                                cursor :not-allowed"
                                title="سجل الدخول لتقديم الاختبار "
                                onclick="confirmExamStart(this)"
                                data-route="{{ route('arabicSecondAndThird') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>
                    @endif
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/العلوم.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div>

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان علوم - جميع الصفوف</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div>
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5]"
                                @if (!Auth::user())
                                disabled
                                style="background-color: grey;
                                cursor :not-allowed"
                                title="سجل الدخول لتقديم الاختبار "
                                @endif

                                onclick="confirmExamStart(this)"
                                data-route="{{ route('science') }}">
                                ابدأ الاختبار
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- COURSES SECTION END -->



        </div>
    </main>
    @if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'خطأ',
            text: '{{ session('error') }}',
            confirmButtonText: 'حسناً'
        });
    </script>
@endif
@endsection
