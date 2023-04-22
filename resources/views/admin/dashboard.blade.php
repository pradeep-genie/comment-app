@extends('admin.layouts.admin_main')
@push('title')
<title>Admin Dashboard</title>  
@endpush
@section('admin_main-section')
    <!-- Start right Content here -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <ol class="breadcrumb mb-0">
                                <h3 class="breadcrumb-item active text-dark">Welcome  {{ Auth::guard('admin')->user()->name }}
                                </h3>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.users.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/02.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Users</h5>
                                    <h4 class="font-weight-medium font-size-24">50<i
                                        class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right h5"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.subscriptions.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/01.png') }}" alt="">
                                    </div>
                                    <h6 class="font-size-16 text-uppercase mt-0 text-white">Subscription</h6>
                                    <h4 class="font-weight-medium font-size-24">20 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.movies.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/03.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Movies</h5>
                                    <h4 class="font-weight-medium font-size-24">15 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right h5"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.genres.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/04.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Genre</h5>
                                    <h4 class="font-weight-medium font-size-24">20 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right h5"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.banners.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/04.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Banner Image</h5>
                                    <h4 class="font-weight-medium font-size-24">20 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right h5"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.languages.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/04.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Languages</h5>
                                    <h4 class="font-weight-medium font-size-24">20 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right h5"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.advertisements.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/04.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Advertisement</h5>
                                    <h4 class="font-weight-medium font-size-24">20 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <i class="mdi mdi-arrow-right h5"></i></a>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>


                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <a href="{{route('admin.talents.index')}}" class="text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-left mini-stat-img mr-4">
                                        <img src="{{ asset('assets/images/services-icon/04.png') }}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase mt-0 text-white">Talents</h5>
                                    <h4 class="font-weight-medium font-size-24 text-white">20 <i
                                            class="mdi mdi-arrow-up text-success ml-2"></i></h4>
                                </div>
                                <div class="p-1" style="background-color: #B30008">
                                    <div class="float-right">
                                        <a href="{{route('admin.talents.index')}}" class="text-white"><i class="mdi mdi-arrow-right"></i>
                                    </div>

                                    <p class="text-white mb-0 mt-1">Since last month</p>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>


                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection
