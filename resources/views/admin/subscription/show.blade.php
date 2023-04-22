@extends('admin.layouts.admin_main')
@push('title')
    <title>Orders Details</title>
@endpush
@section('admin_main-section')
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Orders</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
                            </ol>
                            <div class="text-right"><a href="{{ route('admin.subscriptions.index') }}">
                                <button class="btn btn-primary" type="button" aria-expanded="false">Back
                                </button>
                            </a></div>
                        </div>
                    </div>

                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="invoice-title">
                                            <h4 class="float-right font-size-16"><strong>Order # 12345</strong></h4>
                                            <h3 class="mt-0">HotOTT
                                            </h3>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-6 mt-4">
                                                <address>
                                                    <strong>Payment Method:</strong><br>
                                                    {{ $view_subscriptions->payment_mode }}<br>
                                                    @foreach($view_user as $user )
                                                            @if ($user->id==$view_subscriptions->user_id)
                                                            {{$user->name}}
                                                            @endif
                                                    @endforeach
                                                </address>
                                            </div>
                                            <div class="col-6 mt-4 text-right">
                                                <address>
                                                    <strong>Order Date:</strong><br>
                                                    {{ \Carbon\Carbon::parse($view_subscriptions->payment_date)->format('d/m/Y')}}
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="p-2">
                                                <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                            </div>
                                            <div class="">
                                                <div class="table-responsive">
                                                    <table class="table border border-primary">
                                                        <thead>
                                                            <tr>
                                                                <td><strong>Start Date</strong></td>
                                                                <td class="text-center"><strong>End Date</strong></td>
                                                                <td class="text-center"><strong>Reference Number</strong>
                                                                </td>
                                                                <td class="text-center"><strong> Transaction ID</strong>
                                                                </td>
                                                                <td class="text-center"><strong>Status</strong>
                                                                </td>
                                                                <td class="text-right"><strong>amount</strong></td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ $view_subscriptions->start_date }}</td>
                                                                <td class="text-center">{{ $view_subscriptions->end_date }}
                                                                </td>
                                                                <td class="text-right">
                                                                    {{ $view_subscriptions->reference_id }}</td>
                                                                <td class="text-center">
                                                                    {{ $view_subscriptions->transaction_id }}</td>
                                                                <td class="text-center">{{ $view_subscriptions->status }}
                                                                </td>
                                                                <td class="text-right">{{ $view_subscriptions->amount }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line"></td>
                                                                <td class="no-line text-center">
                                                                    <h3>Total</h3>
                                                                </td>
                                                                <td class="no-line text-right">
                                                                    <h4 class="m-0">{{ $view_subscriptions->amount }}
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="d-print-none">
                                                    <div class="float-right">
                                                        <a href="javascript:window.print()"
                                                            class="btn btn-success waves-effect waves-light"><i
                                                                class="fa fa-print"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row -->

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
