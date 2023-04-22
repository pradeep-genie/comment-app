<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token -->
    @stack('title')
    <!-- Favicons -->
    <link href="{{ asset('assets/images/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" />

    <style>
        .navbar-brand-box {
            background: #07133d !important;
        }

        .vertical-menu {
            background: #07133d !important;
        }

        .bg-primary {
            background-color: #07133d!important;
        }
        #sidebar-menu ul li a {
            color: #ffffff!important;
        }
        .mm-active .active i {
            color: #ffffff!important;
        }
        #sidebar-menu ul li a i {
            color: #ffffff!important;
        }
    </style>

</head>

<body data-sidebar="dark">
    <!-- Navigation -->
    <?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $url1 = explode('/', $url); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ======= Header ======= -->
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{ route('dashboard') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/favicon.ico') }}" height="22" alt="logo" class="logo logo-admin">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/favicon.ico') }}" height="18" alt="logo" class="logo logo-admin">
                            </span>
                        </a>

                        <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="{{ asset('assets/images/favicon.ico') }}" height="22" alt="logo">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('assets/images/logo.jpeg') }}" height="60" alt="logo">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assets/images/users/user-4.jpg') }}" alt="Header Avatar">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a class="dropdown-item" href="#">
                                <i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Profile</a>

                            <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}">
                                <i class="mdi mdi-account-circle font-size-17 align-middle mr-1"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header><!-- End Header -->
