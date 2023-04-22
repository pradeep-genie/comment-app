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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Advertisement</a></li>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{route('admin.advertisement.create')}}">
                                            <button class="btn btn-primary" type="button" aria-expanded="false">Create
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <form action="{{ route('admin.advertisements.search') }}" method="GET">
                                    <div class="col-md-3 mt-1 float-left ">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." />
                                    </div>
                                    <div class="float-left m-1">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                        <a class="m-1" href="{{route('admin.advertisements.index')}}"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
                                            data-toggle="tooltip" data-placement="top" title=""
                                           data-original-title="Clear Search Filters">
                                           <i class="mdi mdi-refresh"></i>Reset
                                       </button></a>
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
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Sr.No</th>
                                                    <th>title</th>
                                                    <th>Description</th>
                                                    <th>Video</th>
                                                    <th>duration</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if (count($advertisement_data) > 0)
                                                <?php $i = 1; foreach($advertisement_data as $item){?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td><img src="{{asset('storage/advertisement/'.$item->advertised_video)}}" alt="image" width="150" height="100"></td>
                                                    <td>{{$item->duration}}</td>

                                                    <td>
                                                        <a href="{{route('admin.advertisement.edit',$item->id)}}" class="btn btn-primary">
                                                            <i class="fa fa-edit"></i></a>

                                                        <a href="{{route('admin.advertisement.delete',$item->id)}}" class="btn btn-danger">
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
                                                    {{ $advertisement_data->firstItem() }} - {{ $advertisement_data->lastItem() }} of {{ count($advertisements) }} results
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6">
                                                <div class="float-right d-none d-md-block">
                                                    <div class="d-flex justify-content-center">
                                                        {!! $advertisement_data->links() !!}
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