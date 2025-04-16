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
            <a href="#" class="btn btn-secondary mt-1 py-3 px-5"style="font-family: 'Tajawal'">قراءة المزيد</a>
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
                {{-- <!-- img -->
                <div class="max-w-[50%] md:max-w-full grow relative">
                    <img src="{{ asset('assets/img/schoolpic.jpg') }}" height="536px" width="490px"
                        style="border-radius: 10px" alt="صورة عن المدرسة">
                    <img src="assets/img/about-img-vector.svg" alt="رمز"
                        class="absolute -top-[25px] left-[25px] -z-[1] w-[90%] max-w-[100%]">
                </div> --}}

                <!-- txt -->
                <div class="max-w-[50%] md:max-w-full shrink-0 grow"style="text-align: right; display: block;">
                    <h6 class="ed-section-sub-title" style="margin-right: 47px; font-size: 30px;">من نحن</h6>
                    <h2 class="ed-section-title mb-[9px]" style="margin-right: 40px">مرحباً بكم في مدرسة التميز النموذجية</h2>
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

<!-- Facilities Start -->
<div class="container-fluid pt-5"style="text-align: right; display: block;">
    <div class="container pb-3">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">اختباراتنا التعليمية المبتكرة</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg" style="font-family: 'Handlee', cursive, font-size: 20px">اختبر معرفتك وتعلم بطريقة تفاعلية ممتعة</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pr-4">
                        <h4>اختبار الرياضيات</h4>
                        <p class="m-0"style="font-family: 'Tajawal', sans-serif">اختبر مهاراتك في الرياضيات مع أسئلة تغطي الجبر والهندسة والإحصاء لجميع المستويات</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pr-4">
                        <h4>اختبار اللغة العربية</h4>
                        <p class="m-0"style="font-family: 'Tajawal', sans-serif;">طور مهاراتك اللغوية في النحو والصرف والأدب العربي مع تمارين متنوعة</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pr-4">
                        <h4>اختبار العلوم</h4>
                        <p class="m-0"style="font-family: 'Tajawal', sans-serif;">استكشف عالم العلوم مع اختبارات في الفيزياء والكيمياء والأحياء للمراحل المختلفة</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pr-4">
                        <h4>اختبار اللغة الإنجليزية</h4>
                        <p class="m-0"style="font-family: 'Tajawal', sans-serif;">تحسين مهارات القواعد والمفردات والقراءة والكتابة باللغة الإنجليزية</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pr-4">
                        <h4>اختبار التاريخ</h4>
                        <p class="m-0"style="font-family: 'Tajawal', sans-serif;">اكتشف أحداث وشخصيات تاريخية مهمة من خلال اختبارات في التاريخ القديم والحديث</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pr-4">
                        <h4>اختبار الجغرافيا</h4>
                        <p class="m-0"style="font-family: 'Tajawal', sans-serif;">تعرف على بلدان العالم والتضاريس والظواهر الطبيعية من خلال اختبارات متنوعة</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





        {{-- <section>
            <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{asset('assets1/img/woman-teaching-classroom.jpg')}}" alt="">
                </div>
                <div class="col-lg-7">
                    <p class="section-title pr-5"><span class="pr-2">Learn About Us</span></p>
                    <h1 class="mb-4">Best School For Your Kids</h1>
                    <p>Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo dolor lorem ipsum ut sed eos,
                        ipsum et dolor kasd sit ea justo. Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor</p>
                    <div class="row pt-2 pb-4">
                        <div class="col-6 col-md-4">
                            <img class="img-fluid rounded" src="{{asset('assets1/img/about-2.jp')}}g" alt="">
                        </div>
                        <div class="col-6 col-md-8">
                            <ul class="list-inline m-0">
                                <li class="py-2 border-top border-bottom"><i class="fa fa-check text-primary mr-3"></i>Labore eos amet dolor amet diam</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Etsea et sit dolor amet ipsum</li>
                                <li class="py-2 border-bottom"><i class="fa fa-check text-primary mr-3"></i>Diam dolor diam elitripsum vero.</li>
                            </ul>
                        </div>
                    </div>
                    <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
        </section> --}}

        <section>
            <!-- About Start -->
            <div class="container-fluid py-5"style="text-align: right; display: block;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <img class="img-fluid rounded mb-5 mb-lg-0" src="{{asset('assets1/img/woman-teaching-classroom.jpg')}}" alt="معلمة تشرح للطلاب في الفصل">
                        </div>
                        <div class="col-lg-7">
                            <p class="section-title pr-5"style="font-family: 'Tajawal';font-size:20px"><span class="pr-2">تعرف على مدرستنا</span></p>
                            <h1 class="mb-4">أفضل مدرسة لأطفالكم</h1>
                            <p style="font-family: 'Tajawal';font-size:20px">نقدم بيئة تعليمية محفزة تركز على تنمية المهارات الأكاديمية والاجتماعية، مع اهتمام خاص بذوي صعوبات التعلم. نؤمن بأن كل طفل لديه طريقة فريدة في التعلم، ونسعى لاكتشافها وتطويرها.</p>
                            <div class="row pt-2 pb-4">
                                <div class="col-6 col-md-4">
                                    <img class="img-fluid rounded" src="{{asset('assets1/img/about-2.jpg')}}" alt="طلاب يدرسون في المكتبة">
                                </div>
                                <div class="col-6 col-md-8">
                                    <ul class="list-inline m-0">
                                        <li class="py-2 border-top border-bottom"style="font-family: 'Tajawal'"><i class="fa fa-check text-primary mr-3"></i>اختبارات تشخيصية دقيقة لمستوى الطلاب</li>
                                        <li class="py-2 border-bottom"style="font-family: 'Tajawal'"><i class="fa fa-check text-primary mr-3"></i>برامج دعم مخصصة لصعوبات التعلم</li>
                                        <li class="py-2 border-bottom"style="font-family: 'Tajawal'"><i class="fa fa-check text-primary mr-3"></i>كادر تعليمي مؤهل ومدرب على أحدث الأساليب</li>
                                    </ul>
                                </div>
                            </div>
                            <a href="" class="btn btn-primary mt-2 py-2 px-4">المزيد عنا</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
        </section>


        <section class="bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px]" dir="rtl"
            style="margin-bottom: 10vh; margin-top:10vh" id="ourMessage">

            <div class="mx-[19.71%] xxxl:mx-[14.71%] xxl:mx-[9.71%] xl:mx-[5.71%] md:mx-[12px]">
                <div class="flex flex-col justify-between items-center gap-y-[40px]">
                    <div class="text-center mb-[46px] lg:mb-[36px] md:mb-[26px]">
                        <h2 class="ed-section-sub-title" style="font-size: 50px">رسالتنا ورؤيتنا </h2>
                        <h6 class="ed-section-title" style="font-size: 30px">رسالتنا ورؤيتنا</h6>
                    </div>
                    <!-- Text Section -->
                    <div class="w-full ">
                        <!-- Additional Info Section -->
                        <div
                            class="flex flex-row xs:flex-wrap xxs:flex-wrap gap-y-[30px] gap-x-[40px] justify-center items-center">
                            <!-- Single Info (رسالتنا) -->
                            <div class="flex flex-col items-center text-center gap-[15px] max-w-[45%]">
                                <div
                                    class="shrink-0 bg-edpurple h-[100px] aspect-square rounded-[8px] flex items-center justify-center">
                                    <img src="{{asset('assets1/img/school-3980940_1280.jpg')}}" alt="هدفنا" class="w-[50%]">
                                </div>
                                <div>
                                    <h6 class="font-bold text-[30px] text-edblue mb-[10px] leading-[1.4]" style="font-size: 30px">رسالتنا</h6>
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
                                    <h6 class="font-bold text-[30px] text-edblue mb-[10px] leading-[1.4]" style="font-size: 30px">رؤيتنا</h6>
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


        {{-- <!-- INSTRUCTORS SECTION START -->
        <section class="bg-edoffwhite py-[120px] xl:py-[80px] md:py-[60px] relative z-[1] overflow-hidden" dir="rtl"
            id="teamwork">
            <div class="mx-[19.7%] xxxl:mx-[14.7%] xxl:mx-[9.7%] xl:mx-[3.2%] md:mx-[15px]">
                <!-- heading -->
                <div class="text-center mb-[46px] lg:mb-[36px] md:mb-[26px]">
                    <h2 class="ed-section-sub-title">فريق العمل</h2>
                    <h6 class="ed-section-title">فريقنا من الخبراء</h6>
                </div>
                <div class="grid grid-cols-5 sm:grid-cols-1 sm:px-4 xs:px-4 xs:grid-cols-1 xxs:grid-cols-1 gap-[30px] md:gap-[15px] justify-center"
                    style="height: 63vh;">

                    <!-- single instructor -->
                    <div class="text-center group">
                        <!-- img -->
                        <div class="relative mb-[18px] overflow-hidden rounded-[12px]">
                            <img src="assets/img/first.jpeg" alt="نعايم الحويان"
                                class="w-full aspect-[270/320] object-cover group-hover:scale-110" style="height: 47vh;">
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-semibold text-[18px] text-edblue mb-[12px]">نعايم الحويان</h6>
                            <span class="text-edgray">مديرة المدرسة</span>
                        </div>
                    </div>
                </div>
                <!-- instructor cards -->
                <div
                    class="grid grid-cols-4 sm:grid-cols-3 xs:grid-cols-2 xxs:grid-cols-1 gap-[30px] md:gap-[15px] justify-center">

                    <!-- single instructor -->
                    <div class="text-center group">
                        <!-- img -->
                        <div class="relative mb-[18px] overflow-hidden rounded-[12px]">
                            <img src="assets/img/fifth.jpeg" alt="هدى التركية"
                                class="w-full aspect-[270/320] object-cover group-hover:scale-110">
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-semibold text-[18px] text-edblue mb-[12px]">هدى التركية</h6>
                            <span class="text-edgray">معلمة المرحلة الأساسية (الصف الأول)</span>
                        </div>
                    </div>


                    <!-- single instructor -->
                    <div class="text-center group">
                        <!-- img -->
                        <div class="relative mb-[18px] overflow-hidden rounded-[12px]">
                            <img src="assets/img/fourth.jpeg" alt="أسماء جويفل"
                                class="w-full aspect-[270/320] object-cover group-hover:scale-110">
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-semibold text-[18px] text-edblue mb-[12px]">أسماء جويفل</h6>
                            <span class="text-edgray">معلمة المرحلة الأساسية (الصف الثاني)</span>
                        </div>
                    </div>

                    <!-- single instructor -->
                    <div class="text-center group">
                        <!-- img -->
                        <div class="relative mb-[18px] overflow-hidden rounded-[12px]">
                            <img src="assets/img/third.jpeg" alt="ياسمين الدعجة"
                                class="w-full aspect-[270/320] object-cover group-hover:scale-110">
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-semibold text-[18px] text-edblue mb-[12px]">ياسمين الدعجة</h6>
                            <span class="text-edgray">معلمة الفيزياء</span>
                        </div>
                    </div>

                    <!-- single instructor -->
                    <div class="text-center group">
                        <!-- img -->
                        <div class="relative mb-[18px] overflow-hidden rounded-[12px]">
                            <img src="assets/img/second.jpeg" alt="عبير السكارنة"
                                class="w-full aspect-[270/320] object-cover group-hover:scale-110">
                        </div>

                        <!-- txt -->
                        <div>
                            <h6 class="font-semibold text-[18px] text-edblue mb-[12px]">عبير السكارنة</h6>
                            <span class="text-edgray">معلمة الرياضيات</span>
                        </div>
                    </div>
                </div>

                <!-- vectors -->
                <div class="lg:hidden">
                    <div
                        class="pointer-events-none w-[434px] aspect-square rounded-full bg-edpurple/15 absolute -z-[1] top-0 left-[56px] -translate-y-[50%]">
                    </div>
                    <div
                        class="pointer-events-none w-[694px] aspect-square rounded-full bg-edpurple/10 absolute -z-[1] bottom-0 right-[21px] translate-y-[50%]">
                    </div>
                    <img src="assets/img/admission-vector-2.svg" alt="vector"
                        class="absolute -z-[1] bottom-[154px] right-[58px]">
                    <img src="assets/img/instructor-vector.svg" alt="vector"
                        class="absolute -z-[1] top-[120px] left-0">
                </div>
            </div>
        </section>
        <!-- INSTRUCTORS SECTION END --> --}}


        <section>
            <!-- Team Start -->
            <div class="container-fluid pt-5">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5"><span class="px-2">كادرنا التعليمي</span></p>
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
                            <i>معلمة صعوبات تعلم</i>
                            <p class="mt-2 text-muted">خبيرة في استراتيجيات دعم صعوبات القراءة (الديسلكسيا)</p>
                        </div>
                        
                        <!-- المعلم الثاني -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/smiling-young-bald-call-center-man-holding-folders-looking-straight-pointing-side-isolated-green-wall.jpg')}}" alt="المعلم محمد خالد">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>محمد خالد</h4>
                            <i>أخصائي نطق ولغة</i>
                            <p class="mt-2 text-muted">متخصص في اضطرابات التواصل والتوحد</p>
                        </div>
                        
                        <!-- المعلم الثالث -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/front-view-young-saleswoman-holding-skipping-rope-green-surface.jpg')}}" alt="المعلمة رنا عبدالله">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>رنا عبدالله</h4>
                            <i>معلمة تربية خاصة</i>
                            <p class="mt-2 text-muted">خبيرة في تعديل السلوك والتدخل المبكر</p>
                        </div>
                        
                        <!-- المعلم الرابع -->
                        <div class="col-md-6 col-lg-3 text-center team mb-5">
                            <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                                <img class="img-fluid w-100" src="{{asset('assets1/img/young-bearded-man-blue-shirt-holding-folder-blank-pages-displeased.jpg')}}" alt="المعلم يوسف محمود">
                                <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                            <h4>يوسف محمود</h4>
                            <i>أخصائي نفسي تربوي</i>
                            <p class="mt-2 text-muted">متخصص في تقييم القدرات العقلية وصعوبات التعلم</p>
                        </div>
                    </div>
                    
                    <!-- قسم إضافي يمكن إضافته -->
                    <div class="text-center mt-4">
                        <p class="lead"style="font-family: 'Tajawal', sans-serif;">فريقنا مؤلف من <strong>خبراء متخصصين</strong> في التعامل مع صعوبات التعلم بمختلف أنواعها</p>
                        <a href="#" class="btn btn-primary px-4 mt-3">تعرف أكثر على منهجيتنا</a>
                    </div>
                </div>
            </div>
            <!-- Team End -->
        </section>

        {{-- <section>
             <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Our Teachers</span></p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{asset('assets1/img/half-length-shot-attractive-confident-muslim-college-student-holds-notebooks-paper-documents-prepares-project-work-lesson-wears-pink-hijab-round-spectacles-jean-clothes-studying-concept.jpg')}}" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Julia Smith</h4>
                    <i>Music Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{asset('assets1/img/smiling-young-bald-call-center-man-holding-folders-looking-straight-pointing-side-isolated-green-wall.jpg')}}" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Jhon Doe</h4>
                    <i>Language Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{asset('assets1/img/front-view-young-saleswoman-holding-skipping-rope-green-surface.jpg')}}" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Mollie Ross</h4>
                    <i>Dance Teacher</i>
                </div>
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img class="img-fluid w-100" src="{{asset('assets1/img/young-bearded-man-blue-shirt-holding-folder-blank-pages-displeased.jpg')}}" alt="" >
                        <div
                            class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                                href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <h4>Donald John</h4>
                    <i>Art Teacher</i>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
        </section> --}}

        <!-- BLOG SECTION START -->
        <section  style="margin-top:100px">
            <div style="text-align: center;">
                <!-- heading -->
                <div >
                    <h6 class="ed-section-sub-title" style="font-size: 24px">خدمات الموقع</h6>
                    <h2 class="ed-section-title">أحدث استراتيجيات لدينا</h2>
                </div>

                <!-- service cards -->
                    <!-- single service -->
                    <div class="et-service__txt" style="text-align: center; margin-top:50px;">
                        <h4 class="et-service__title text-20px sm:text-18px font-semibold ">
                            تشخيص صعوبات التعلم في القراءة والحساب
                        </h4>
                    
                        <!-- الصور جنب بعض باستخدام inline styles -->
                        <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-moktader-billah-3562307-20754865.jpg')}}" alt="">
                            </div>
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-mikhail-nilov-8923081.jpg')}}" alt="">
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
                        <h4 class="et-service__title text-[20px] sm:text-[18px] font-semibold leading-[1.6] mb-[20px]">
                            تقارير تفصيلية للطلاب لتحديد الاحتياجات التعليمية</h4>
                            <p class="text-edgray text-[16px]">إعداد تقارير شاملة لكل طالب تحتوي على توصيات تعليمية تساعد
                                على تحقيق أهداف التعلم.</p>
                    
                        <!-- الصور جنب بعض باستخدام inline styles -->
                        <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-moktader-billah-3562307-20754865.jpg')}}" alt="">
                            </div>
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-mikhail-nilov-8923081.jpg')}}" alt="">
                            </div>
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-school-projects-749994697-18650478.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="et-service__txt" style="margin-top:50px ;text-align: center;">
                        <h4 class="et-service__title text-[20px] sm:text-[18px] font-semibold leading-[1.6] mb-[20px]">
                            استراتيجيات دعم خاصة مصممة لكل طالب</h4>
                        <p class="text-edgray text-[16px]">تصميم خطط دعم فردية وفقًا لاحتياجات الطالب لضمان تحقيق أقصى
                            قدر من التحصيل الدراسي.</p>
                    
                        <!-- الصور جنب بعض باستخدام inline styles -->
                        <div style="width: 100%; display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-moktader-billah-3562307-20754865.jpg')}}" alt="">
                            </div>
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-mikhail-nilov-8923081.jpg')}}" alt="">
                            </div>
                            <div style="width: 33%; height: 300px; overflow: hidden; border-radius: 10px;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="{{asset('assets1/img/pexels-school-projects-749994697-18650478.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- BLOG SECTION END -->

        
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
