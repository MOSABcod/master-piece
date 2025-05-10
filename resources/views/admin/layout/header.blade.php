<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>مدرسة التميز النموذجية</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" type="image/png" href="{{ asset('assets1/img/teddy-bear.png') }}">

    <base href="{{ url('/') }}/" target="_self">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/css/style.css" rel="stylesheet">
    <style>
        /* Adjust Navbar to be closer to Sidebar */
        .navbar {
            margin-left: 0; /* Remove any left margin */
            padding-left: 20px; /* Adjust the padding if needed */
        }

        /* Adjust Sidebar width if necessary */
        .sidebar {
            width: 300px;
        }

        /* Ensure content takes full space and aligns properly */
        .content {
            margin-left: 0; /* Remove left margin */
            /* padding-left: 20px; Adjust content padding */
            min-height: 100vh;
            background: #ffffff;
        }

        /* Adding space between the burger menu and the sidebar */
        .sidebar-toggler {
            margin-left: 10px; /* Adjust this value to create more or less space */
        }

        /* Adjust sidebar for responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 180px; /* Further reduce sidebar width for small screens */
            }

            .content {
                margin-left: 180px; /* Adjust content margin to fit the sidebar */
            }
        }
        a:hover{
        background-color: #f8f9fa;
        color: #17a2b8 ;
    }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border" style="width: 3rem; height: 3rem; color: #17a2b8;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        {{-- sidebar --}}
        @include('admin.layout.sidebar')
        {{-- sidebar end --}}

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0" style="height: 7vh;">
                <a href="{{ route('dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><img src="{{ asset('assets/img/dashborad logo.png') }}" alt="" width="44px"></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0" style="padding:5px;">
                    <i class="fa fa-bars" style="color:#17a2b8 ;"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-start bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Log Out</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
