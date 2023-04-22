@extends('admin.layouts.admin_main')
@push('title')
    <title>Add Genre</title>
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
                                <li class="breadcrumb-item">Movies Genre</li>
                                <li class="breadcrumb-item active">Add Genre</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a href="{{ route('admin.genres.index') }}">
                                    <button class="btn btn-primary" type="button" aria-expanded="false">Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="custom-validation" action="{{ route('admin.genre.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit_genre))
                                        <input hidden value="{{ $edit_genre->id }}" name="genre_id" />
                                    @endif

                                    <div class="form-group row">
                                        <label for="genre_title" class="col-sm-2 col-form-label">Title :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="genre_title" name="genre_title"
                                                required placeholder="Enter Title"
                                                value="{{ isset($edit_genre) ? $edit_genre->genre_title : '' }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="genre_description" class="col-sm-2 col-form-label">Description
                                            :</label>
                                        <div class="col-sm-10">
                                            {{-- <input type="text" class="form-control" id="genre_description"
                                                name="genre_description" required placeholder="Enter Description"
                                                value="{{ isset($edit_genre) ? $edit_genre->genre_description : '' }}" /> --}}

                                                <textarea id="genre_description" class="form-control" rows="5" name="genre_description" placeholder="Enter Description" required>{{ isset($edit_genre) ? $edit_genre->genre_description : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="genre_status" class="col-sm-2 col-form-label">Status :</label>
                                        <div class="col-sm-10">
                                            <select name="genre_status" id="genre_status" class="form-control" required>
                                                <option value="">Select</option>
                                                <option value="Y" {{ isset($edit_genre)?$edit_genre->genre_status == 'Y' ? 'selected':'':'' }}>Yes</option>
                                                <option value="N" {{ isset($edit_genre)?$edit_genre->genre_status == 'N' ? 'selected':'':'' }}>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="genre_description" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
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
