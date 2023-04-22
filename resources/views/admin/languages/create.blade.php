@extends('admin.layouts.admin_main')
@push('title')
    <title>Add Language</title>
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
                                <li class="breadcrumb-item">Language Details</li>
                                <li class="breadcrumb-item active">Add Language</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <a href="{{ route('admin.languages.index') }}">
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

                                <form class="custom-validation" action="{{ route('admin.language.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit_language))
                                        <input hidden value="{{ $edit_language->id }}" name="language_id" />
                                    @endif

                                    <div class="form-group row">
                                        <label for="language" class="col-sm-2 col-form-label">Language Name :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="language" name="language"
                                                placeholder="Enter language"
                                                value="{{ isset($edit_language) ? $edit_language->language : '' }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="language_image" class="col-sm-2 col-form-label">Language image :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="language_image"
                                                name="language_image" required
                                                value="{{ isset($edit_language) ? $edit_language->language_image : '' }}" />

                                            @if(isset($edit_language))
                                                <!-- Show the image box -->
                                                <img src="{{asset('storage/languages/'.(isset($edit_language) ? $edit_language->language_image : ''))}}" alt="image" width="50" height="50">
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
