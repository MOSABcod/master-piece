<style>
    .nav-link:hover{
        color: #17a2b8;
        border-color: #17a2b8;
    }
    .nav-link>*{
        color: #17a2b8;
    }
    .nav-link.active{
        background-color: #17a2b8;
        color: white;
    }
 
    .nav-link >* :hover{
        background-color: white;
        color: #17a2b8;
    }
    a:hover{
        background-color: #f8f9fa;
        color: #17a2b8 ;
    }
</style>
<div class="sidebar pe-4 pb-3" style="    overflow: hidden;">
    <nav class="navbar " >
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><img src="{{ asset('assets1/img/Screenshot 2025-04-17 234629.png') }}" alt=""></h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                {{-- Profile Image Placeholder --}}
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
                        طالب/ة
                    @endif
                </span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <!-- Highlight the active link dynamically -->
            <a href="{{ route('dashboard') }}" onmousedown="this.style.color = '17a2b8'" class="nav-item nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }} mb-2" style="color: #17a2b8 ,border-color: #17a2b8">
                <i class="fa fa-tachometer-alt me-2"></i>الصفحة الرئيسية
            </a>

           @if (Auth::user()->role == "manager")
           <a href="{{ route('viewTeachers') }}" class="nav-item nav-link {{ Request::routeIs('viewTeachers') ? 'active' : '' }} mb-2">
            <i class="fa fa-chalkboard-teacher me-2"></i>إدارة المعلمين
        </a>
           @endif

            <a href="{{ route('viewStudents') }}" class="nav-item nav-link {{ Request::routeIs('viewStudents') ? 'active' : '' }} mb-2">
                <i class="fa fa-users me-2"></i>إدارة الطلاب
            </a>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="POST" class="nav-item nav-link p-0">
                @csrf
                <button type="submit" style="margin-right: 8px !important " class="btn btn-link text-decoration-none text-dark w-100 text-end">
                    <i class="fa fa-sign-out-alt me-2"></i>تسجيل خروج
                </button>
            </form>
        </div>
    </nav>
</div>
