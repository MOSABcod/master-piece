  <!-- Footer Start -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Success Message -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'نجاح',
                text: '{{ session('success') }}',
                confirmButtonText: 'حسنًا'
            });
        </script>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <script>
            let errorMessages = `
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            `;
            Swal.fire({
                icon: 'error',
                title: 'خطأ',
                html: errorMessages, // Display all errors
                confirmButtonText: 'حسنًا'
            });
        </script>
    @endif
<footer>
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5"style="text-align: right; display: block;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">التميز النموذجية</span>
                </a>
                <p>  نقدم تعليمًا متميزًا يراعي الفروق الفردية، مع تركيز خاص على تشخيص صعوبات التعلم وتطوير استراتيجيات دعم مخصصة لكل طالب لضمان تحقيقهم لأفضل النتائج.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://x.com/YourUsername"><i class="fab fa-x-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://facebook.com/YourPage"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://linkedin.com/in/YourProfile"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="https://instagram.com/YourProfile"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">أبق على تواصل</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3 mb-3">
                        <h5 class="text-white mx-3">موقعنا</h5>
                        <p>الأردن,السلط</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3 mb-3">
                        <h5 class="text-white mx-3">البريد الالكتروني</h5>
                        <p>changing@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3 mb-3">
                        <h5 class="text-white mx-3">رقم الهاتف</h5>
                        <p>+962 7773 70766</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">روابط سريعة</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="/"><i class="fa fa-angle-right mr-2 mx-2 mb-2"></i>الرئيسية</a>
                    <a class="text-white mb-2" href="#exams"><i class="fa fa-angle-right mr-2 mx-2 mb-2"></i>أخباراتنا</a>
                    <a class="text-white mb-2" href="#about"><i class="fa fa-angle-right mr-2 mx-2 mb-2"></i>مدرستنا</a>
                    <a class="text-white mb-2" href="#strategies"><i class="fa fa-angle-right mr-2 mx-2 mb-2">الأسترتيجيات</i></a>
                    <a class="text-white mb-2" href="#teachers"><i class="fa fa-angle-right mr-2 mx-2 mb-2"></i>معلمونا</a>
                    <a class="text-white" href="/login"><i class="fa fa-angle-right mr-2 mx-2 mb2"></i>تسجيل الدخول</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">تواصل معنا</h3>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control border-0 py-4" placeholder="الأسم" required="required" style="direction:rtl ;text-align:right " />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0 py-4" placeholder="البريد الألكتروني"
                            required="required" />
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">أرسال الأن</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">التميز النموذجية</a>. جميع الحقوق محفوضة. 
            </p>
        </div>
    </div>
</footer>
    
