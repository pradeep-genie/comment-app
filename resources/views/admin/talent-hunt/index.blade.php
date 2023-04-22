@extends('admin.layouts.admin_main')
@push('title')
<title>Telent Hunt</title>  
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Talent Hunt</a></li>
                                    </ol>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="float-right d-none d-md-block">
                                    <div class="dropdown">
                                        <a href="{{route('admin.dashboard')}}">
                                            <button class="btn btn-primary" type="button" aria-expanded="false">
                                                Back
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <form action="{{ route('admin.talents.search') }}" method="GET">
                                    <div class="col-md-3 mt-1 float-left ">
                                        <input type="text" class="form-control" name="search" placeholder="Search..." />
                                    </div>
                                    <div class="float-left m-1">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">Submit</button>
                                        <a class="m-1" href="{{route('admin.talents.index')}}"><button type="button" class="btn btn-primary waves-effect waves-light mr-1"
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
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Url</th>
                                                    <th>Video</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if (count($talent_data) > 0)
                                                <?php $i = 1; foreach($talent_data as $item){?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td>{{$item->video_url}}</td>
                                                    <td>
                                                        <img src="{{asset('storage/talenthunt/'.$item->video)}}" alt="video" width="150" height="150">
                                                    </td>
                                                    <td>
                                                        <a href="{{route('admin.talents.view',$item->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View</a>
                                                    </td>

                                                    <?php $i++; ?>
                                                </tr>
                                                <?php }?>
                                                @else
                                                    <tr>
                                                        <td></td><td></td>
                                                        <td class="text-center">No data found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="page-title-box">
                                                    {{ $talent_data->firstItem() }} - {{ $talent_data->lastItem() }} of {{ count($talents) }} results
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6">
                                                <div class="float-right d-none d-md-block">
                                                    <div class="d-flex justify-content-center">
                                                        {!! $talent_data->links() !!}
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