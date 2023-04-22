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
                                <a href="{{ route('admin.talents.index') }}">
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
                                                    <td>
                                                        @foreach ($user_details as $user)
                                                            @if ($user->id == $talents_view->user_id)
                                                                {{ $user->name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b> Title </b></td>
                                                    <td>{{ $talents_view->title  }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Description</b></td>
                                                    <td>{{ $talents_view->description }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Video</b></td>
                                                    <td>{{ $talents_view->video }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Video Url</b></td>
                                                    <td>{{ $talents_view->video_url }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Share</b></td>
                                                    <td>{{ $talents_view->share }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Likes</b></td>
                                                    <td>{{ $talents_view->likes }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>View</b></td>
                                                    <td>{{ $talents_view->view }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Comments</b></td>
                                                    <td>{{ $talents_view->comments }}</td>
                                                </tr>

                                            </tbody>
                                        </table>
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
