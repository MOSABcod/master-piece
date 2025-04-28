@extends('user.layout.mainlayout')

@section('content')

<style>
/* General Styles */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 15px;
}

/* Profile Card */
.profile-card {
    display: flex;
    align-items: center;
    background-color: #fff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
}

.profile-image img {
    border-radius: 50%;
    border: 4px solid #17a2b8 ;
}

/* Typography */
h6 {
    font-size: 16px;
    color: #111111;
    margin-bottom: 5px;
}



/* Responsive Layout */
@media (max-width: 768px) {
    .profile-card {
        flex-direction: column;
        text-align: center;
    }

    .grid {
        grid-template-columns: 1fr;
    }

    .profile-image {
        margin-bottom: 20px;
    }
}



</style>
<section class="student-profile bg-edoffwhite pt-80px pb-80px mt-5 ml-5 mr-5">
    <div class="container mx-auto px-[5%]">
        <!-- Profile Card -->
        <div class="profile-card bg-white rounded-[20px] shadow-lg p-[40px] flex items-center gap-[30px]">
            <!-- Profile Image -->
            {{-- <div class="profile-image flex-shrink-0 w-[120px] h-[120px] rounded-full overflow-hidden shadow-md">
                <img src="https://via.placeholder.com/120" alt="Student Image" class="w-full h-full object-cover">
            </div> --}}
            <!-- Profile Details -->
            <div class="flex-grow">
                <div class="grid grid-cols-3 gap-[20px] text-center md:text-right">
                    <div>
                        <h4 class="font-medium text-edgray text-[16px]">الاسم</h4>
                        <p class="font-bold text-black text-[20px]">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <h4 class="font-medium text-edgray text-[16px]">الرقم الوطني</h4>
                        <p class="font-bold text-black text-[20px]">{{ Auth::user()->national_id  }}</p>
                    </div>
                    <div>
                        <h4 class="font-medium text-edgray text-[16px]">الصف</h4>
                        <p class="font-bold text-black text-[20px]">
                            @switch(Auth::user()->class_id)
                                @case(1)
                                        روضة
                                    @break
                                @case(2)
                                    صف أول
                                    @break
                                @case(3)
                                    صف ثاني
                                    @break
                                @case(4)
                                    صف ثالث
                                    @break
                                @default

                            @endswitch

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


         <!-- COURSES SECTION START -->
         <section class="ed-2-courses py-120px xl:py-80px md:py-60px mt-5" style="text-align: right; display: block;">
            <div class="mx-9.2% xxxl:mx-8.2% xxl:mx-3% mr-4 ml-4">
                <!-- section heading -->
                <div class="text-center mb-[21px]">
                    {{-- <h6 class="ed-section-sub-title">الامتحانات</h6> --}}
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


                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"
                                onclick="confirmExamStart(this)"
                                @if ($first)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('mathFirst') }}">
                                @if ($first)
                                    تم تقديم الاختبار
                                    @else
                                    ابدأ الاختبار
                                    @endif
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user() &&(Auth::user()->class_id == 3 || Auth::user()->class_id == 4 || Auth::user()->role == "teacher" || Auth::user()->role == "manager")  )

                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - الصف الثاني والثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"
                                onclick="confirmExamStart(this)"
                                @if ($second)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('mathSecondAndThird') }}">
                                @if ($second)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user() &&(Auth::user()->class_id == 1 || Auth::user()->class_id == 2 || Auth::user()->role == "teacher")  )

                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"
                                onclick="confirmExamStart(this)"
                                @if ($third)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('arabicFirst') }}">
                                @if ($third)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (Auth::user() &&(Auth::user()->class_id == 3 || Auth::user()->class_id == 4 || Auth::user()->role == "teacher" || Auth::user()->role == "manager")  )

                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - الصف الثاني و الصف الثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"
                                onclick="confirmExamStart(this)"
                                @if ($fourth)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('arabicSecondAndThird') }}">
                                @if ($fourth)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>
                    @endif
                    @if (!Auth::user())
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"
                                @if ($first)
                                disabled
                                style="background-color: grey"
                            @endif
                            onclick="confirmExamStart(this)"
                            data-route="{{ route('mathFirst') }}">
                            @if ($first)
                                                            تم تقديم الاختبار
                                                            @else
                                                            ابدأ الاختبار
                                                            @endif
                            </button>
                        </div>
                    </div>
        <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/الرياضيات.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a  class="hover:text-edpurple">امتحان رياضيات - الصف الثاني والثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"

                                onclick="confirmExamStart(this)"
                                @if ($second)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('mathSecondAndThird') }}">
                                @if ($second)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>
        <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - روضة و الصف الاول</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"

                                onclick="confirmExamStart(this)"
                                @if ($third)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('arabicFirst') }}">
                                @if ($third)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/download.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="course-details.html" class="hover:text-edpurple">امتحان عربي - الصف الثاني و الصف الثالث</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"

                                onclick="confirmExamStart(this)"
                                @if ($fourth)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('arabicSecondAndThird') }}">
                                @if ($fourth)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>
                    @endif
                    <div class="ed-2-single-course mix personal-skill border border-[#e5e5e5] rounded-[10px] p-[20px] group mb-3" style="text-align: center">
                        <!-- course image  -->
                        <div class="relative overflow-hidden rounded-[10px] mb-[24px]">
                            <img src="assets/img/العلوم.svg" alt="Course Image" class="w-full aspect-[330/223] h-auto object-contain group-hover:scale-110">

                        </div>

                        <!-- course infos -->
                        {{-- <div class="flex justify-between items-center mb-[16px]">
                            <span class="inline-flex items-center justify-center border border-[#e5e5e5] px-[10px] h-[33px] rounded-[6px] font-medium text-[#808080] text-[14px]">مبتدئ</span>
                        </div> --}}

                        <!-- course title -->
                        <h5 class="font-semibold text-[20px] text-edblue mb-[23px]">
                            <a href="{{route('science')}}"  class="hover:text-edpurple">امتحان علوم - جميع الصفوف</a>
                        </h5>

                        <!-- course stats -->
                        <div class="flex flex-wrap items-center gap-x-[30px] gap-y-[10px]">
                            {{-- <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/user-group.svg" alt="icon"></span>
                                <span class="txt">169 Students</span>
                            </div>

                            <div class="flex items-center gap-[8px] text-[14px] text-edgray">
                                <span class="icon"><img src="assets/img/icon/lesson.svg" alt="icon"></span>
                                <span class="txt">12 Lesson</span>
                            </div> --}}
                        </div>

                        <!-- course footer -->
                        <div class="flex flex-wrap gap-x-[20px] gap-y-[15px] justify-between items-center border-t border-[#E5E5E5] pt-[24px] mt-[24px]">


                            <!-- button to confirm exam start -->
                            <button
                                class="bg-edpurple text-white px-[10px] w-full py-[6px] rounded-[8px] hover:bg-[#5a35a5] mt-5 mb-5"


                                onclick="confirmExamStart(this)"
                                @if ($fifth)
                                    disabled
                                    style="background-color: grey"
                                @endif
                                data-route="{{ route('science') }}">
                                @if ($fifth)
                                                                    تم تقديم الاختبار
                                                                    @else
                                                                    ابدأ الاختبار
                                                                    @endif
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- COURSES SECTION END -->


        <style>
            /* General Styles */
            .ed-section-title {
                font-size: 2rem;
                color: #333;
                margin-bottom: 20px;
            }
            
            /* Course Card Styling */
            .ed-2-single-course {
                background: #ffffff;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .ed-2-single-course:hover {
                transform: translateY(-5px);
                box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
            }
            
            /* Button Styling */
            .bg-edpurple {
                background: #6c63ff;
                border: none;
                transition: background 0.3s ease, transform 0.3s ease;
            }
            .bg-edpurple:hover {
                background: #5a35a5;
                transform: scale(1.05);
            }
            .bg-edpurple:disabled {
                background: #cccccc;
                cursor: not-allowed;
            }
            
            /* Responsive Design */
            @media (max-width: 768px) {
                .ed-2-courses-container {
                    grid-template-columns: 1fr;
                }
            }
            </style>

@endsection
