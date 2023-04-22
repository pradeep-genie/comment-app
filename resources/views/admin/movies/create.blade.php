@extends('admin.layouts.admin_main')
@push('title')
    <title>Add Movies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
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
                                <li class="breadcrumb-item">Movies Details</li>
                                <li class="breadcrumb-item active">Add Movies</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a href="{{ route('admin.movies.index') }}">
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form class="custom-validation" action="{{ route('admin.movies.store') }}"  method="POST"enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Movies Title :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" name="title"
                                                required placeholder="Enter Title"/>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Movies Description:</label>
                                        <div class="col-sm-10">

                                            <textarea id="description" class="form-control" rows="5" name="description" placeholder="Enter Description" required></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="banner_image" class="col-sm-2 col-form-label">Movies Banner :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="banner_image" name="banner_image" placeholder="Upload Banner Image" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="movie_path" class="col-sm-2 col-form-label">Upload Movie :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="movie_path" name="movie_path" placeholder="Upload Video" required/>
                                        </div>
                                    </div>

                                    <div class="col-sm-10 text-center">
                                        <h3>OR</h3>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">Movies Url :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="url" name="url"
                                                required placeholder="Enter Movies Url" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="language_id" class="col-sm-2 col-form-label">Select Language:</label>
                                        <div class="col-sm-10">
                                            <select  class="selectpicker form-control"
                                                    multiple data-live-search="true" name="language_id[]" required >
                                                @foreach ($language as $item)
                                                    <option
                                                        value="{{ $item->id }}">{{ $item->language }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="genre_id" class="col-sm-2 col-form-label">Select Genre :</label>
                                        <div class="col-sm-10">
                                            <select name="genre_id[]" class="selectpicker form-control"
                                            multiple data-live-search="true" id="genre_id" required>
                                                <option value="">select</option>
                                                @foreach ($movie_genre as $item)
                                                    <option
                                                        value="{{ $item->id }}">{{ $item->genre_title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imdb_rating" class="col-sm-2 col-form-label">Rating :</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="imdb_rating" class="form-control"
                                                name="imdb_rating" placeholder="Enter imdb rating" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="release_date" class="col-sm-2 col-form-label">Released Date :</label>
                                        <div class="col-sm-10">
                                            <input type="date" id="release_date" class="form-control" name="release_date" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imdb_rating" class="col-sm-2 col-form-label">Display Type :</label>
                                        <div class="col-sm-10">
                                            <label> <input type="checkbox" name="premium"/> Premium &nbsp; &nbsp; &nbsp;</label>

                                            <label><input type="checkbox" name="standard"/> Standard &nbsp; &nbsp; &nbsp;</label>

                                            <label> <input type="checkbox" name="kids"/> Kids &nbsp; &nbsp; &nbsp;</label>


                                            <label><input type="checkbox" name="devotional"/> devotional</label>
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

    <!-- Initialize the plugin: -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectpicker();
        });
    </script>
@endsection
