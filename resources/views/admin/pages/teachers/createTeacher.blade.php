@extends('admin.layout.mainlayout')

@section('content')
    <style>
        /* Force labels to align to the right in RTL */
        .form-floating label {
            direction: rtl;
            text-align: right;
            right: 0; /* Ensure it sticks to the right side */
            left: unset; /* Remove any left alignment */
        }
    </style>

    <div class="container-fluid pt-4 px-4" style="direction: rtl; text-align: right;">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">نموذج إدخال البيانات</h6>
                <!-- Form for creating teacher -->
                <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="أدخل الاسم" required>
                        <label for="name">الاسم</label>
                    </div>

                    <!-- National ID -->
                    <div class="form-floating mb-3">
                        <input type="number" pattern="\d{10}" class="form-control" id="national_id" name="national_id" placeholder="أدخل الرقم الوطني" >
                        <label for="national_id">الرقم الوطني</label>
                    </div>

                    <!-- Password -->
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="أدخل كلمة المرور" required>
                        <label for="password">كلمة المرور</label>
                    </div>

                    <!-- Role -->
                    <div class="form-floating mb-3">
                        <input type="hidden" value="teacher" class="form-control" id="password" name="role" placeholder="أدخل كلمة المرور" required>

                        <label for="role">الدور</label>
                    </div>

                    <!-- Age -->
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="age" name="age" placeholder="أدخل العمر">
                        <label for="age">العمر</label>
                    </div>

                    <!-- Class ID -->
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="class_id" name="class_id" placeholder="أدخل رقم الصف">
                        <label for="class_id">رقم الصف</label>
                    </div>

                    {{-- <!-- File Upload (Optional) -->
                    <div class="mb-3">
                        <label for="file" class="form-label">تحميل ملف (اختياري)</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div> --}}

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection
