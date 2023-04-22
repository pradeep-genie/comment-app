@extends('admin.layouts.admin_main')
@push('title')
    <title>Advertisement</title>
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
                                <li class="breadcrumb-item">Advertisement</li>
                                <li class="breadcrumb-item active">Add Advertisement</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <a href="{{ route('admin.advertisements.index') }}">
                                <button class="btn btn-primary" type="button" aria-expanded="false">
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form class="custom-validation" action="{{ route('admin.advertisement.store') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit_advertisement))
                                        <input hidden value="{{ $edit_advertisement->id }}" name="advertisement_id" />
                                    @endif

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Title :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" name="title"
                                                required placeholder="Enter title"
                                                value="{{ isset($edit_advertisement) ? $edit_advertisement->title : '' }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Description :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="description" name="description"
                                                required placeholder="Enter Description"
                                                value="{{ isset($edit_advertisement) ? $edit_advertisement->description : '' }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="duration" class="col-sm-2 col-form-label">Duration :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="duration" name="duration"
                                                required placeholder="Enter Duration"
                                                value="{{ isset($edit_advertisement) ? $edit_advertisement->duration : '' }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="advertised_video" class="col-sm-2 col-form-label">Video/Image :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="advertised_video"
                                                name="advertised_video"
                                                value="{{ isset($edit_advertisement) ? $edit_advertisement->advertised_video : '' }}" />

                                                @if(isset($edit_advertisement))
                                                <!-- Show the image box -->
                                                <img src="{{asset('storage/advertisement/'.(isset($edit_advertisement) ? $edit_advertisement->advertised_video : ''))}}" alt="image" width="50" height="50">
                                                @else
                                                    <!-- Hide the image box -->
                                                @endif
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="genre_description" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->
@endsection
