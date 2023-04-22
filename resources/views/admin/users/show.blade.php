@extends('admin.layouts.admin_main')
@push('title')
    <title>Users Details</title>
@endpush
@section('admin_main-section')
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title-box">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item">Users Details</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a href="{{ route('admin.users.index') }}">
                                    <button class="btn btn-primary" type="button" aria-expanded="false">
                                        Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive ">
                                    <div class="col-md">
                                        <table class="table table-bordered">

                                            <tbody>
                                                <tr>
                                                    <td><b>Name </b></td>
                                                    <td>{{$show_user->name}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email</b></td>
                                                    <td>{{$show_user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone</b></td>
                                                    <td>{{$show_user->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>City</b></td>
                                                    <td>{{$show_user->city}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>State</b></td>
                                                    <td>{{$show_user->state}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pincode</b></td>
                                                    <td>{{$show_user->pincode}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Address</b></td>
                                                    <td>{{$show_user->address}}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b>Language</b></td>
                                                    <td>
                                                        @foreach($language as $lang )
                                                            @if ($lang->id==$show_user->lang_1)
                                                                {{$lang->language}} ,
                                                            @endif
                                                            @if ($lang->id==$show_user->lang_2)
                                                                {{$lang->language}} ,
                                                            @endif
                                                            @if ($lang->id==$show_user->lang_3)
                                                                {{$lang->language}}
                                                            @endif
                                                        @endforeach
                                                        

                                                    </td>
                                                </tr>
                                               
                                                <tr>
                                                    <td><b>Latitude</b></td>
                                                    <td>{{$show_user->latitude}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>longitude</b></td>
                                                    <td>{{$show_user->longitude}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Profile Image</b></td>
                                                    <td>{{$show_user->profile_image}}</td>
                                                </tr>

                                                

                                            </tbody>
                                            
                                        </table>
                                        <h3>Device Details</h3>

                                        <div class="table-responsive ">
                                            <div class="col-md">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td><b>App Installation Date</b></td>
                                                            <td>{{$show_user->installed_date}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>App Installation Latitude</b></td>
                                                            <td>{{$show_user->latitude}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>App Installation Longitude</b></td>
                                                            <td>{{$show_user->lognitute}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Device Name</b></td>
                                                            <td>{{$show_user->device_name}}</td>
                                                        </tr>

                                                        <tr>
                                                            <td><b>Device IMEI</b></td>
                                                            <td>{{$show_user->device_imei}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>Installation Address</b></td>
                                                            <td>{{$show_user->address}}</td>
                                                        </tr>
                                                    
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection
