@extends('admin.layouts.admin_main')
@push('title')
<title>Subscriptions</title>  
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Subscriptions</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-12">
                                <form action="{{ route('admin.subscriptions.search') }}" method="GET">
                                    <div class="col-md-3 mt-1 float-left ">
                                        <label for="">Search</label>
                                        <input type="text" class="form-control" name="search" placeholder="Search...Transaction ID" />
                                    </div>

                                    <div class="col-md-3 mt-1 float-left ">
                                        <label for="">Start Date</label>
                                        <input type="date" name="start_date" class="form-control">
                                    </div>

                                    <div class="col-md-3 mt-1 float-left">
                                        <label for="">End Date</label>
                                        <input type="date" name="end_date" class="form-control">
                                    </div>

                                    <div class="col-md-3 float-left" style="margin-top: 32px">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
                                        <a href="{{route('admin.subscriptions.index')}}">
                                            <button type="button" class="btn btn-primary waves-effect waves-light mr-1"><i class="mdi mdi-refresh"></i>Reset
                                            </button>
                                        </a>
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
                                                    <th>Name</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>transaction</th>
                                                    <th>Amount</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @if (count($subscription_data) > 0)
                                                <?php $i = 1; foreach($subscription_data as $item){?>
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    @foreach($user_details as $user )
                                                            @if ($user->id==$item->user_id)
                                                                <td> {{$user->name}}</td>
                                                            @endif
                                                    @endforeach
                                                    <td>{{$item->start_date}}</td>
                                                    <td>{{$item->end_date}}</td>
                                                    <td>{{$item->transaction_id }}</td>
                                                    <td>{{$item->amount}}</td>
                                                    <td>{{$item->status}}</td>
                                                    <td>
                                                        <a href="{{route('admin.subscription.details',$item->id)}}" class="btn btn-success">
                                                            <i class="fa fa-eye"></i></a>
                                                        </td>
                                                    <?php $i++; ?>
                                                </tr>
                                                <?php }?>
                                                @else
                                                    <tr>
                                                        
                                                        <td></td><td></td><td></td>
                                                        <td class="text-center">No data found</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                        <div class="row align-items-center">
                                            <div class="col-sm-6">
                                                <div class="page-title-box">
                                                    {{ $subscription_data->firstItem() }} - {{ $subscription_data->lastItem() }} of {{ count($subscriptions) }} results
                                                </div>
                                            </div>
                        
                                            <div class="col-sm-6">
                                                <div class="float-right d-none d-md-block">
                                                    <div class="d-flex justify-content-center">
                                                        {!! $subscription_data->links() !!}
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