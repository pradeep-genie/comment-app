@extends('admin.layouts.admin_main')
@push('title')
    <title>Users Details</title>
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
                                <li class="breadcrumb-item">Users Details</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a href="{{ route('admin.talents.subscriptions') }}">
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
                                                    <td><b>Name </b></td>
                                                    <td>
                                                        @foreach ($user_details as $user)
                                                            @if ($user->id == $show_subscriptions->user_id)
                                                                {{ $user->name }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b>Pack </b></td>
                                                    <td>
                                                        @foreach ($movie_pack as $pack)
                                                            @if ($pack->id == $show_subscriptions->pack_id)
                                                                {{ $pack->plan }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><b> Start Date </b></td>
                                                    <td>{{ $show_subscriptions->start_date  }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>End Date</b></td>
                                                    <td>{{ $show_subscriptions->end_date }}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <td><b>Reference</b></td>
                                                    <td>{{ $show_subscriptions->reference_id }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Transaction</b></td>
                                                    <td>{{ $show_subscriptions->transaction_id }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>Amount</b></td>
                                                    <td>{{ $show_subscriptions->amount }}</td>
                                                </tr>

                                                <tr>
                                                    <td><b>status</b></td>
                                                    <td>{{ $show_subscriptions->status }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Payment Mode</b></td>
                                                    <td>{{ $show_subscriptions->payment_mode }}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Payment Date</b></td>
                                                    <td>{{ $show_subscriptions->payment_date }}</td>
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
