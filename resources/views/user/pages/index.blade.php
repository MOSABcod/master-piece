@extends('user.layout.mainlayout')

@section('content') 
    <main >
    <!-- Header Start -->
<div class="container-fluid bg-primary px-0 px-md-5 mb-5"style="text-align: right; display: block;">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-end">
            <h4 class="text-white mb-4 mt-5 mt-lg-0">مدرسة التميز النموذجية</h4>
            <h3 class="display-3 font-weight-bold text-white">نحو تعليم متكامل يراعي الفروق الفرديه ويدعم كل طالب نحو التميز</h3>
            <p class="text-white mb-4" style="font-family: 'Tajawal', sans-serif; font-size:22px">
                مرحبًا بكم في الموقع الرسمي لمدرستنا التميز، حيث نقدم بيئة تعليمية داعمة ومبتكرة تركز على قياس مستويات الطلاب وتحديد صعوبات التعلم لمساعدتهم على تحقيق أفضل النتائج.
                نؤمن بأن كل طالب لديه قدرات فريدة، وهدفنا هو اكتشافها وتطويرها.
            </p>
        </div>
        
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5" src="{{asset('assets1/img/header.png')}}" alt="">
        </div>
    </div>
</div>
<!-- Header End -->
    
    <!-- ABOUT SECTION START -->
    <section class="py-[120px] xl:py-[80px] md:py-[60px]" dir="rtl">
        <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
            <div class="flex md:flex-col justify-between items-center gap-x-[60px] xl:gap-x-[40px] gap-y-[40px]">
                

                <!-- txt -->
                <div class="max-w-[50%] md:max-w-full shrink-0 grow"style="text-align: right; display: block;">
                    {{-- <h6 class="ed-section-sub-title" style="margin-right: 47px; font-size: 30px;">من نحن</h6> --}}
                    <h2 class="ed-section-title mb-[9px]" style="margin-right: 40%">مرحباً بكم في مدرسة التميز النموذجية</h2>
                    <p class="text-edgray" style="font-size: 20px; margin-right: 35px; font-family: 'Cairo', sans-serif; ">مدرسة التميز النموذجية تسعى جاهدة لتحقيق بيئة
                        تعليمية شاملة وعادلة، تركز على تطوير الإمكانيات الأكاديمية والشخصية لجميع الطلاب. نحن نؤمن
                        بأهمية مراعاة الفروق الفردية بين الطلاب، وتوفير فرص متساوية للجميع بغض النظر عن خلفياتهم أو
                        قدراتهم. تسعى المدرسة إلى بناء بيئة صحية ومحفزة، تشجع على الابتكار والتفكير النقدي، وتوفر الدعم
                        النفسي والاجتماعي لضمان نجاح كل طالب في تحقيق أهدافه التعليمية والشخصية. كما تعمل المدرسة على
                        تعزيز القيم الإنسانية مثل الاحترام المتبادل، العمل الجماعي، والمسؤولية الاجتماعية، لتكون جزءًا
                        من تربية جيل قادر على مواجهة تحديات المستقبل بثقة وعزيمة.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION END-->

<!-- Facilities Start -->
<section id="exams">
    <div class="container-fluid pt-5" style="text-align: right; display: block;">
        <div class="container pb-3" style="font-family: 'Tajawal', sans-serif; font-size:18px ">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">اختباراتنا التعليمية المبتكرة</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-lg">اختبر معرفتك وتعلم بطريقة تفاعلية ممتعة</p>
            </div>
            <div class="row">
                <!-- اختبار الرياضيات مع قائمة منسدلة -->
                <div class="col-lg-4 col-md-6 pb-1 mt-4">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4 hover-card" style="padding: 30px;">
                        <i class="fa-solid fa-calculator" style="color: #17a2b8; font-size: 50px;"></i>
                        <div class="pr-4 w-100">
                            <h4>اختبار الرياضيات</h4>
                            <p class="m-0" style="font-family: 'Tajawal', sans-serif">اختبر مهاراتك في الرياضيات مع أسئلة تغطي الجبر والهندسة والإحصاء لجميع المستويات</p>
                            <div class="mt-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="mathDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        اختر المستوى
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="mathDropdown">
                                        <a class="dropdown-item" href="{{ route('mathFirst') }}">المستوى الأول</a>
                                        <a class="dropdown-item" href="{{ route('mathSecondAndThird') }}">المستوى الثاني والثالث</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- اختبار اللغة العربية مع قائمة منسدلة -->
                <div class="col-lg-4 col-md-6 pb-1 mt-4">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4 hover-card" style="padding: 30px;">
                        <i class="fa-solid fa-book-quran" style="color: #17a2b8; font-size: 50px;"></i>
                        <div class="pr-4 w-100">
                            <h4>اختبار اللغة العربية</h4>
                            <p class="m-0" style="font-family: 'Tajawal', sans-serif;">طور مهاراتك اللغوية في النحو والصرف والأدب العربي مع تمارين متنوعة</p>
                            <div class="mt-3">
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="arabicDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        اختر المستوى
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="arabicDropdown">
                                        <a class="dropdown-item" href="{{ route('arabicFirst') }}">المستوى الأول</a>
                                        <a class="dropdown-item" href="{{ route('arabicSecondAndThird') }}">المستوى الثاني والثالث</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- اختبار العلوم -->
                <div class="col-lg-4 col-md-6 pb-1 mt-4">
                    <a href="{{ route('science') }}" class="text-decoration-none">
                        <div class="d-flex bg-light shadow-sm border-top rounded mb-4 hover-card" style="padding: 30px;">
                            <i class="fa-solid fa-flask" style="color: #17a2b8; font-size: 50px;"></i> 
                            <div class="pr-4">                   
                                <h4>اختبار العلوم</h4>
                                <p class="m-0" style="font-family: 'Tajawal', sans-serif; padding:16px; color:#666666">استكشف عالم العلوم مع اختبارات في الفيزياء والكيمياء والأحياء للمراحل المختلفة</p>
                            </div>
                        </div>
                    </a>
                </div>
                
                <!-- اختبارات قريبة -->
                <div class="col-lg-4 col-md-6 pb-1 mt-4">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4 hover-card" style="padding: 30px;">
                        <i class="fa-solid fa-spell-check" style="color: #17a2b8; font-size: 50px;"></i>
                        <div class="pr-4">
                            <h4>اختبار اللغة الإنجليزية</h4>
                            <p class="m-0" style="font-family: 'Tajawal', sans-serif;"> (قريبا في منصتنا)</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 pb-1 mt-4">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4 hover-card" style="padding: 30px;">
                        <i class="fa-solid fa-landmark" style="color: #17a2b8; font-size: 50px;"></i>
                        <div class="pr-4">
                            <h4> اختبار التاريخ</h4>
                            <p class="m-0" style="font-family: 'Tajawal', sans-serif;"> (قريبا في منصتنا) </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 pb-1 mt-4">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4 hover-card" style="padding: 30px;">
                        <i class="fa-solid fa-book-atlas" style="color: #17a2b8; font-size: 50px;"></i>
                        <div class="pr-4">
                            <h4>اختبار الجغرافيا</h4>
                            <p class="m-0" style="font-family: 'Tajawal', sans-serif;"> (قريبا في منصتنا) </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<!-- Facilities End -->




    
            <!-- About Start -->
        <section id="about" style="margin-top: 100px">
            <div class="container-fluid py-5"style="text-align: right; display: block;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <img class="img-fluid rounded mb-5 mb-lg-0" style="margin-top: 20%" src="{{asset('assets1/img/woman-teaching-classroom.jpg')}}" alt="معلمة تشرح للطلاب في الفصل">
                        </div>
                        <div class="col-lg-7">
                            <p class="section-title pr-5"style="font-family: 'Tajawal';font-size:25px"><span class="pr-2">تعرف على مدرستنا</span></p>
                            <h1 class="mb-4">أفضل مدرسة لأطفالكم</h1>
                            <p style="font-family: 'Tajawal';font-size:22px">نقدم بيئة تعليمية محفزة تركز على تنمية المهارات الأكاديمية والاجتماعية، مع اهتمام خاص بذوي صعوبات التعلم. نؤمن بأن كل طفل لديه طريقة فريدة في التعلم، ونسعى لاكتشافها وتطويرها.</p>
                            <div class="row pt-2 pb-4">
                                <div class="col-6 col-md-4">
                                    <img class="img-fluid rounded" src="{{asset('assets1/img/about-2.jpg')}}" alt="طلاب يدرسون في المكتبة">
                                </div>
                                <div class="col-6 col-md-8">
                                    <ul class="list-inline m-0">
                                        <li class="py-2 border-top border-bottom"style="font-family: 'Tajawal';font-size:18px"><i class="fa fa-check text-primary mr-3"></i>اختبارات تشخيصية دقيقة لمستوى الطلاب</li>
                                        <li class="py-2 border-bottom"style="font-family: 'Tajawal';font-size:18px"><i class="fa fa-check text-primary mr-3"></i>برامج دعم مخصصة لصعوبات التعلم</li>
                                        <li class="py-2 border-bottom"style="font-family: 'Tajawal';font-size:18px"><i class="fa fa-check text-primary mr-3"></i>كادر تعليمي مؤهل ومدرب على أحدث الأساليب</li>
                                    </ul>
                                </div>
                            </div>
                            {{-- <a href="" class="btn btn-primary mt-2 py-2 px-4">المزيد عنا</a> --}}
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- About End -->


        <!-- BLOG SECTION START -->

        <section  style="margin-top:100px" id="strategies">
            <div style="text-align: center;">
        <!-- heading -->
        <div >
            <p class="section-title px-5" style="font-family: 'Tajawal';font-size:25px"><span class="px-2">أحدث الأسترتيجيات لدينا</span></p>
        </div>

        <!-- service cards -->
            <!-- single service -->
            <div class="et-service__txt" style="text-align: center; margin-top:50px;">
                <h4 class="et-service__title text-20px sm:text-18px font-semibold " style="font-size: 30px">
                    تشخيص صعوبات التعلم في القراءة والحساب
                </h4>
            
                {{-- الصف الاول من الصور --}}
                <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-moktader-billah-3562307-20754865.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/blog-2.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-school-projects-749994697-18650478.jpg')}}" alt="">
                    </div>
                </div>
            </div>
            
    </div>
</section>
<section> 
            
            <div class="et-service__txt" style="margin-top:50px ;text-align: center;">
                <h4 class="et-service__title text-[20px] sm:text-[18px] font-semibold leading-[1.6] mb-[20px]" style="font-size: 30px">
                    تقارير تفصيلية للطلاب لتحديد الاحتياجات التعليمية</h4>
                    <p class="text-edgray text-[16px]" style="font-family: 'Tajawal', sans-serif; font-size:22px">إعداد تقارير شاملة لكل طالب تحتوي على توصيات تعليمية تساعد
                        على تحقيق أهداف التعلم.</p>
            
                {{-- الصف الثاني من الصور --}}
                <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/class-1.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/class-2.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/class-3.jpg')}}" alt="">
                    </div>
                </div>
            </div>

            <div class="et-service__txt" style="margin-top:50px ;text-align: center;">
                <h4 class="et-service__title text-[20px] sm:text-[18px] font-semibold leading-[1.6] mb-[20px]" style="font-size: 30px">
                    استراتيجيات دعم خاصة مصممة لكل طالب</h4>
                <p class="text-edgray text-[16px]" style="font-family: 'Tajawal', sans-serif; font-size:22px">تصميم خطط دعم فردية وفقًا لاحتياجات الطالب لضمان تحقيق أقصى
                    قدر من التحصيل الدراسي.</p>
            
                {{-- الصف الثالث من الصور --}}
                <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-keira-burton-6084124.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-yankrukov-8613114.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-keira-burton-6084128.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- BLOG SECTION END -->

    
    <!-- Team Start -->
        <section id="teachers">
            <div class="container-fluid pt-5">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5" style="font-family: 'Tajawal';font-size:25px"><span class="px-2">كادرنا التعليمي</span></p>
                        <h1 class="mb-4">تعرف على معلمينا المتميزين</h1>
                    </div>
                    <div class="row">
                        <!-- المعلم الأول -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/half-length-shot-attractive-confident-muslim-college-student-holds-notebooks-paper-documents-prepares-project-work-lesson-wears-pink-hijab-round-spectacles-jean-clothes-studying-concept.jpg')}}" alt="المعلمة سارة أحمد">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://x.com/YourUsername"><i class="fab fa-x-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/YourPage"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/in/YourProfile"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>سارة أحمد</h4>
                            <i style="font-family: 'Tajawal';font-size:17px">معلمة صعوبات تعلم</i>
                            <p class="mt-2 text-muted" style="font-family: 'Tajawal';font-size:20px">خبيرة في استراتيجيات دعم صعوبات القراءة (الديسلكسيا)</p>
                        </div>
                        
                        <!-- المعلم الثاني -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/smiling-young-bald-call-center-man-holding-folders-looking-straight-pointing-side-isolated-green-wall.jpg')}}" alt="المعلم محمد خالد">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://x.com/YourUsername"><i class="fab fa-x-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/YourPage"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/in/YourProfile"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>محمد خالد</h4>
                            <i style="font-family: 'Tajawal';font-size:17px">أخصائي نطق ولغة</i>
                            <p class="mt-2 text-muted" style="font-family: 'Tajawal';font-size:20px">متخصص في اضطرابات التواصل والتوحد</p>
                        </div>
                        
                        <!-- المعلم الثالث -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/front-view-young-saleswoman-holding-skipping-rope-green-surface.jpg')}}" alt="المعلمة رنا عبدالله">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://x.com/YourUsername"><i class="fab fa-x-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/YourPage"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/in/YourProfile"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>رنا عبدالله</h4>
                            <i style="font-family: 'Tajawal';font-size:17px">معلمة تربية خاصة</i>
                            <p class="mt-2 text-muted" style="font-family: 'Tajawal';font-size:20px">خبيرة في تعديل السلوك والتدخل المبكر</p>
                        </div>
                        
                        <!-- المعلم الرابع -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/young-bearded-man-blue-shirt-holding-folder-blank-pages-displeased.jpg')}}" alt="المعلم يوسف محمود">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://x.com/YourUsername"><i class="fab fa-x-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/YourPage"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/in/YourProfile"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>يوسف محمود</h4>
                            <i style="font-family: 'Tajawal';font-size:17px">أخصائي نفسي تربوي</i>
                            <p class="mt-2 text-muted" style="font-family: 'Tajawal';font-size:20px">متخصص في تقييم القدرات العقلية وصعوبات التعلم</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team End --> 

        <section class="bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px]" dir="rtl"
            style="margin-bottom: 10vh; margin-top:10vh" id="mission-vision">

            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex flex-col justify-between items-center gap-y-[40px]">
                    <div class="text-center mb-[46px] lg:mb-[36px] md:mb-[26px]">
                        <h2 class="ed-section-sub-title" style="font-size: 50px">رسالتنا ورؤيتنا </h2>
                    </div>
                    <!-- Text Section -->
                    <div class="w-full ">
                        <!-- Additional Info Section -->
                        <div
                            class="flex flex-row xs:flex-wrap xxs:flex-wrap gap-y-[30px] gap-x-[40px] justify-center items-center">
                            <!-- Single Info (رسالتنا) -->
                            <div class="flex flex-col items-center text-center gap-[15px] max-w-[45%]">
                                <div
                                    class="shrink-0 bg-edpurple h-[100px] aspect-square rounded-[8px] flex items-center justify-center pr-0">
                                    <img src="{{asset('assets1/img/school-3980940_1280.jpg')}}" alt="هدفنا" class="w-[50%]">
                                </div>
                                <div>
                                    <h6 class="font-bold text-30px text-edblue mb-10px leading-1.4 mt-5" style="font-size: 30px">رسالتنا</h6>
                                    <p class="text-[24px] text-edgray leading-[1.8]" style="font-family: 'Cairo', sans-serif; font-size: 24px">إعداد طلبة ناجحين من خلال استراتيجيات
                                        مبتكرة تواكب التعليم الحديث، مع تطوير مهارات التفكير النقدي والإبداعي، وتعزيز القدرة
                                        على حل المشكلات واتخاذ القرارات. تسعى المدرسة إلى دمج التكنولوجيا في التعليم وتوفير
                                        بيئة مرنة ومتنوعة تواكب التحديات العالمية.</p>
                                </div>
                            </div>

                            <!-- Single Info (رؤيتنا) -->
                            <div class="flex flex-col items-center text-center gap-[15px] max-w-[45%]">
                                <div
                                    class="shrink-0 bg-edpurple h-[100px] aspect-square rounded-[8px] flex items-center justify-center">
                                    <img src="{{asset('assets1\img\to-learn-3701963_1280.jpg')}}" alt="رؤيتنا" class="w-[50%]">
                                </div>
                                <div>
                                    <h6 class="font-bold text-30px text-edblue mb-10px leading-1.4 mt-5" style="font-size: 30px">رؤيتنا</h6>
                                    <p class="text-[24px] text-edgray leading-[1.8]" style="font-family: 'Cairo', sans-serif; font-size: 24px">تعزيز فرص التعليم الشامل والارتقاء
                                        بالمستوى التعليمي للمجتمع يتطلب توفير بيئة تعليمية متكاملة تضمن فرصًا متساوية لجميع
                                        الأفراد، مع تحديث المناهج وتدريب المعلمين على استراتيجيات مبتكرة. كما يتطلب التوعية
                                        بأهمية التعليم المستدام لبناء مجتمع قادر على مواجهة التحديات المستقبلية.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <!-- CTA 2 SECTION START -->
        <section class="mt-[120px] xl:mt-[80px] md:mt-[60px]" dir="rtl">
            <div
                class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px] bg-[url('../assets/img/cta-3-bg.jpg')] bg-no-repeat bg-cover bg-center rounded-[20px] overflow-hidden text-center py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] before:absolute before:inset-0 before:bg-edpurple/80 before:-z-[1]">
                <div class="max-w-[570px] mx-auto">
                    <h6 class="ed-section-sub-title ed-section-sub-title--white ml-[48px]" style="font-size: 24px">رسالتنا التعليمية</h6>
                    <h2 class="ed-section-title !text-white mb-[18px]">خلق بيئة تعليمية تفاعلية تشجع أولياء الأمور والمجتمع
                        المحلي على المساهمة في بناء مستقبل طلابنا</h2>
                </div>
            </div>
            <div>
                <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/front-view-mother-helping-kid-with-homework.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-gustavo-fring-4173114.jpg')}}" alt="">
                    </div>
                    <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                        <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-timur-weber-9127783.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA 2 SECTION END -->

        <script>
            // Initialize slideIndex
            let slideIndex = 1;
            showSlides(slideIndex);

            // Next/previous controls
            function plusSlides(n) {
                showSlides(slideIndex += n);
            }

            // Thumbnail image controls
            function currentSlide(n) {
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("demo");
                let captionText = document.getElementById("caption");

                // Loop back to the first slide if n exceeds the number of slides
                if (n > slides.length) {
                    slideIndex = 1
                }
                // Loop to the last slide if n is less than 1
                if (n < 1) {
                    slideIndex = slides.length
                }

                // Hide all slides
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }

                // Remove "active" class from all dots
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }

                // Display the current slide
                slides[slideIndex - 1].style.display = "block";
                // Add "active" class to the corresponding dot
                dots[slideIndex - 1].className += " active";
                // Update caption text
                captionText.innerHTML = dots[slideIndex - 1].alt;
            }
        </script>


        <!-- COURSES SECTION START -->
        <section class="ed-2-courses py-[120px] xl:py-[80px] md:py-[60px]">

        </section>
        <!-- COURSES SECTION END -->



        </div>
    </main>
    <Script></Script>
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
<style>
.hover-card {
    transition: all 0.3s ease;
    cursor: pointer;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    background-color: #f8f9fa !important;
}

.hover-card i {
    transition: all 0.3s ease;
}

.hover-card:hover i {
    transform: scale(1.1);
    color: #007bff !important;
}
</style>
