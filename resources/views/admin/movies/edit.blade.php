@extends('admin.layouts.admin_main')
@push('title')
    <title>Edit Movies</title>
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
                                <li class="breadcrumb-item active">Edit Movies</li>
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
                                <form class="custom-validation" action="{{ route('admin.movies.edit.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit_movies))
                                        <input hidden value="{{ $edit_movies->id }}" name="movies_id" />
                                    @endif

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Movies Title :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" name="title"
                                                required placeholder="Enter Title"
                                                value="{{ $edit_movies->title }}" />
                                        </div>
                                    </div>

                                    

                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Movies Description:</label>
                                        <div class="col-sm-10">

                                            <textarea id="description" class="form-control" rows="5" name="description" placeholder="Enter Description" required> {{ $edit_movies->description }}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="banner_image" class="col-sm-2 col-form-label">Movies Banner :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="banner_image" name="banner_image" placeholder="Upload Banner Image"
                                                value="{{ $edit_movies->banner_image}}" />

                                                @if(isset($edit_movies))
                                                <!-- Show the image box -->
                                                <img src="{{asset('storage/movies/'.(isset($edit_movies) ? $edit_movies->banner_image : ''))}}" alt="image" width="50" height="50">
                                                @else
                                                    <!-- Hide the image box -->
                                                @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="movie_path" class="col-sm-2 col-form-label">Upload Movie :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="movie_path" name="movie_path" placeholder="Upload Video"
                                                value="{{ isset($edit_movies) ? $edit_movies->movie_path : '' }}" />

                                                @if(isset($edit_movies))
                                                <!-- Show the image box -->
                                                <img src="{{asset('storage/movies/'.(isset($edit_movies) ? $edit_movies->movie_path : ''))}}" alt="image" width="50" height="50">
                                                @else
                                                    <!-- Hide the image box -->
                                                @endif
                                        </div>
                                    </div>

                                    <div class="col-sm-10 text-center">
                                        <h3>OR</h3>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url" class="col-sm-2 col-form-label">Movies Url :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="url" name="url" placeholder="Enter Movies Url"
                                                value="{{ $edit_movies->url }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="language_id" class="col-sm-2 col-form-label">Select Language:</label>
                                        <div class="col-sm-10">
                                            <select name="language_id[]" class="selectpicker form-control "
                                            multiple data-live-search="true" required>

                                            @php($languages = explode(',', $edit_movies->language_id))
                                            @foreach($language as $item)
                                                <option value="{{$item->id}}"
                                                        
                                                        {{in_array($item->id,$languages) ? "selected" : ""}}>
                                                    {{$item->language}}
                                                </option>
                                            @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="genre_id" class="col-sm-2 col-form-label">Select Genre :</label>
                                        <div class="col-sm-10">
                                            <select name="genre_id[]" class="selectpicker form-control " multiple data-live-search="true" id="genre_id" required >
                                                @php($genres = explode(',', $edit_movies->language_id))
                                                @foreach($movie_genre as $item)
                                                <option value="{{$item->id}}"
                                                    {{in_array($item->id,$genres) ? "selected" : ""}}>
                                                    {{$item->genre_title}}
                                                </option>
                                                @endforeach

                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imdb_rating" class="col-sm-2 col-form-label">Rating :</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="imdb_rating" class="form-control"
                                                name="imdb_rating"
                                                value="{{ $edit_movies->imdb_rating }}"
                                                placeholder="Enter imdb rating">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="release_date" class="col-sm-2 col-form-label">Released Date :</label>
                                        <div class="col-sm-10">
                                            <input type="date" id="release_date" class="form-control"
                                                name="release_date"
                                                value="{{ $edit_movies->release_date }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="imdb_rating" class="col-sm-2 col-form-label">Display Type :</label>
                                        <div class="col-sm-10">
                                            <label> <input type="checkbox" name="premium" {{isset($edit_movies)?$edit_movies->premium=='1'?'checked':'':''}}/> <br/>Premium &nbsp; &nbsp;</label>

                                            <label><input type="checkbox" name="standard" {{isset($edit_movies)?$edit_movies->standard=='1'?'checked':'':''}}/> <br/>Standard &nbsp; &nbsp;</label>

                                            <label> <input type="checkbox" name="kids" {{isset($edit_movies)?$edit_movies->kids=='1'?'checked':'':''}}/> <br/>Kids &nbsp; &nbsp;</label>


                                            <label><input type="checkbox" name="devotional" {{isset($edit_movies)?$edit_movies->devotional=='1'?'checked':'':''}}/> <br/>devotional</label>
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
