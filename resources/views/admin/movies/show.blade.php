@extends('admin.layouts.admin_main')
@push('title')
    <title>movie Details</title>
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
                                <li class="breadcrumb-item">Movie Details</li>
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
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive ">
                                    <div class="col-md">
                                        <table class="table table-bordered">

                                            <tbody>
                                                <tr>
                                                    <td><b>Title </b></td>
                                                    <td>{{$show_movie->title}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Description</b></td>
                                                    <td>{{$show_movie->description}}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Movies Banner</b></td>
                                                    <td><img src="{{asset('storage/movies/'.$show_movie->banner_image)}}" alt="image" width="150" height="150"></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Movies</b></td>
                                                    <td><img src="{{asset('storage/movies/'.$show_movie->movie_path)}}" alt="image" width="150" height="150"></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b>Url</b></td>
                                                    <td>{{$show_movie->url}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Rating</b></td>
                                                    <td>{{$show_movie->imdb_rating}}</td>
                                                </tr>

                                                
                                                <tr>
                                                    <td><b>Genre Title</b></td>

                                                    <td>
                                                        @php($selected_genre = explode(',',$show_movie->genre_id))

                                                        @foreach($genres as $gen )
                                                            @if (in_array($gen->id, $selected_genre))
                                                                {{$gen->genre_title." ,";}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b>Language</b></td>

                                                    <td>
                                                        @php($selected_lang =  explode(',',$show_movie->language_id))
                                                        @foreach($language as $lang )
                                                            @if (in_array($lang->id, $selected_lang))
                                                                {{$lang->language." ,";}}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b>Release Date</b></td>
                                                    <td>{{date('d-m-Y', strtotime($show_movie->release_date));
                                                    }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>display</b></td>
                                                    <td class="row">
                                                        <input disabled type="checkbox" name="premium" {{isset($show_movie)?$show_movie->premium=='1'?'checked':'':''}}/> &nbsp;Premium  &nbsp; &nbsp;

                                                        <input disabled type="checkbox" name="standard" {{isset($show_movie)?$show_movie->standard=='1'?'checked':'':''}}/> &nbsp;Standard  &nbsp; &nbsp;

                                                        <input disabled type="checkbox" name="kids" {{isset($show_movie)?$show_movie->kids=='1'?'checked':'':''}}/> &nbsp;Kids &nbsp; &nbsp;

                                                        <input disabled type="checkbox" name="devotional" {{isset($show_movie)?$show_movie->devotional=='1'?'checked':'':''}}/> &nbsp;Devotional  &nbsp; &nbsp;
                                                    </td>
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
