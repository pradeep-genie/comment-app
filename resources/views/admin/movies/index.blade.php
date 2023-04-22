@extends('admin.layouts.admin_main')
@push('title')
<title>Movies Details</title>  
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Movies Details</a></li>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{route('admin.movies.create')}}">
                                            <button class="btn btn-primary" type="button" aria-expanded="false">Add Movies
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <form action="{{ route('admin.movies.index')}}" method="GET">
                                    <div class="col-md-3 mt-1 float-left ">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." />
                                    </div>
                                    <div class="float-left m-1">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                        <a class="m-1" href="{{route('admin.movies.index')}}"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
                                            data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="Clear Search Filters">
                                           <i class="mdi mdi-refresh"></i>Reset
                                       </button></a>
                                    </div>
                                </form>

                                <form action="{{ route('admin.movies.between-dates') }}" method="GET">
                                    <div class="col-md-3 mt-1 float-left ">
                                        <input type="date" name="start_date" class="form-control">
                                    </div>
                                    <div class="col-md-3 mt-1 float-left ">
                                        <input type="date" name="end_date" class="form-control">
                                    </div>
                                    <div class="float-left m-1">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif    
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Banner Image</th>
                                                    <th>Movies</th>
                                                    <th>Url</th>
                                                    <th>IMDB Rating</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if (count($movies_data) > 0)
                                                <?php $i = 1; foreach($movies_data as $item){?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td><img src="{{asset('storage/movies/'.$item->banner_image)}}" class="img-circle person" alt="San Francisco" width="150" height="150"></td>
                                                    <td><img src="{{asset('storage/movies/'.$item->movie_path)}}" class="img-circle person" alt="San Francisco" width="150" height="150"></td>
                                                    <td>{{$item->url}}</td>
                                                    <td>{{$item->imdb_rating}}</td>
                                                    <td>
                                                        <a href="{{route('admin.movies.show',$item->id)}}" class="btn btn-success">
                                                            <i class="fa fa-eye"></i></a>

                                                        <a href="{{route('admin.movies.edit',$item->id)}}" class="btn btn-primary">
                                                            <i class="fa fa-edit"></i></a>

                                                        <a href="{{route('admin.movies.delete',$item->id)}}" class="btn btn-danger">
                                                            <i class="fa fa-trash"></i></a>
                                                        
                                                        </td>
                                                    <?php $i++; ?>
                                                </tr>
                                                <?php }?>
                                                @else
                                                    <tr>
                                                        <th class="d-flex justify-content-center">No data found</th>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="page-title-box">
                                                    {{ $movies_data->firstItem() }} - {{ $movies_data->lastItem() }} of {{ count($total_movies) }} results
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6">
                                                <div class="float-right d-none d-md-block">
                                                    <div class="d-flex justify-content-center">
                                                        {!! $movies_data->links() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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