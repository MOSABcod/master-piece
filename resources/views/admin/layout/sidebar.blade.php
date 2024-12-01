<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                {{-- <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;"> --}}
                {{-- <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div> --}}
            </div>
            <div class="ms-3" style="margin-right: 8px;">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>
                    @if (Auth::user()->role === 'manager')
                        مدير/ة
                    @elseif (Auth::user()->role === 'teacher')
                        معلم/ة
                    @else
                        {{ Auth::user()->role }}
                    @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <!-- Highlight the active link dynamically -->
            <a href="{{ route('dashboard') }}" class="nav-item nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2"></i>الصفحة الرئيسية
            </a>

            <a href="{{ route('viewTeachers') }}" class="nav-item nav-link {{ Request::routeIs('viewTeachers') ? 'active' : '' }}">
                <i class="fa fa-th me-2"></i>ادارة المعلمات
            </a>

            <a href="{{ route('viewStudents') }}" class="nav-item nav-link {{ Request::routeIs('viewStudents') ? 'active' : '' }}">
                <i class="fa fa-th me-2"></i>ادارة الطلاب
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
