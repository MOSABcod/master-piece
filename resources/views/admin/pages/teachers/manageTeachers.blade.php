@extends('admin.layout.mainlayout')
@section('content')
    <!-- Teachers Management Start -->
    <div class="container-fluid pt-4 px-4" style="direction: rtl; text-align: right;">
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">قائمة المعلمين</h6>
                    <a href="{{ route('teacher.create') }}" class="btn " style="background-color: #17a2b8; color:white">إضافة معلم/ة</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0" style="text-align: right;">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col" style="text-align: right;">#</th>
                                <th scope="col" style="text-align: right;">اسم المستخدم</th>
                                <th scope="col" style="text-align: right;">الرقم الوطني</th>
                                {{-- <th scope="col" style="text-align: right;">الدور</th> --}}
                                <th scope="col" style="text-align: right;">العمر</th>
                                <th scope="col" style="text-align: right;">رقم الصف</th>
                                <th scope="col" style="text-align: right;">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->national_id }}</td>
                                    {{-- <td>
                                        @if ($user->role === 'manager')
                                            مدير/ة
                                        @elseif ($user->role === 'teacher')
                                            معلم/ة
                                        @elseif ($user->role === 'student')
                                            طالب/ة
                                        @else
                                            {{ $user->role }}
                                        @endif --}}
                                    <td>{{ $user->age ?? 'غير متوفر' }}</td>
                                    <td>{{ $user->class->class_name ?? 'غير متوفر' }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <button class="btn btn-sm btn-transparnt" data-bs-toggle="modal"
                                            data-bs-target="#editModal-{{ $user->id }}">
                                            <i class="fas fa-edit"></i> تعديل
                                        </button>

                                        <!-- Delete Button -->
                                        <form action="{{ route('teacher.destroy', $user->id) }}" method="POST"
                                            style="display: inline;" id="delete-form-{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-transparnt" style="color: red"
                                                onclick="confirmDelete({{ $user->id }})">
                                                <i class="fas fa-trash-alt"></i> حذف
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel-{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content" style="direction: rtl; text-align: right;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel-{{ $user->id }}" style="margin-left: auto;">تعديل
                                                    بيانات المعلم/ة</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="إغلاق" style="margin: 0rem !important;">
                                                </button>
                                            </div>



                                            <div class="modal-body">
                                                <form action="{{ route('teacher.update', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <!-- Name -->
                                                    <div class="mb-3">
                                                        <label for="name-{{ $user->id }}" class="form-label">اسم
                                                            المستخدم</label>
                                                        <input type="text" class="form-control"
                                                            id="name-{{ $user->id }}" name="name"
                                                            value="{{ $user->name }}" required>
                                                    </div>

                                                    <!-- National ID -->
                                                    <div class="mb-3">
                                                        <label for="national_id-{{ $user->id }}"
                                                            class="form-label">الرقم الوطني</label>
                                                        <input type="number" pattern="\d{10}" class="form-control"
                                                            id="national_id-{{ $user->id }}" name="national_id"
                                                            value="{{ $user->national_id }}" required>
                                                    </div>


                                                    <!-- Age -->
                                                    <div class="mb-3">
                                                        <label for="age-{{ $user->id }}"
                                                            class="form-label">العمر</label>
                                                        <input type="number" class="form-control"
                                                            id="age-{{ $user->id }}" name="age"
                                                            value="{{ $user->age }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="class_id" class="form-label">اختر الصف</label>
                                                        <select class="form-select @error('class_id') is-invalid @enderror"
                                                            id="class_id" name="class_id" required>
                                                            <option value="" disabled
                                                                {{ old('class_id', $user->class_id) ? '' : 'selected' }}>
                                                                اختر الصف</option>
                                                            @foreach ($classes as $class)
                                                                <option value="{{ $class->id }}"
                                                                    @selected(old('class_id', $user->class_id) == $class->id)>
                                                                    {{ $class->class_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('class_id')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <button type="submit"
                                                        class="btn "style="background-color: #27703b; color:white;">حفظ
                                                        التعديلات</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <!-- End Edit Modal -->
                                <!-- End Edit Modal -->
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">لا توجد بيانات لعرضها</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Teachers Management End -->
@endsection
