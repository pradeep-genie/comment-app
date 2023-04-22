@extends('admin.layouts.admin_main')
@push('title')
    <title>edit Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
@endpush
@section('admin_main-section')
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
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-right d-none d-md-block">
                            <div class="dropdown">
                                <a href="{{ route('admin.users.index') }}">
                                    <button class="btn btn-primary" type="button" aria-expanded="false">
                                        Back
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <form class="custom-validation" action="{{ route('admin.user.edit.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if (isset($edit_users))
                                        <input hidden value="{{ $edit_users->id }}" name="user_id" />
                                    @endif

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Name :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name"
                                                required placeholder="Enter Name"
                                                value="{{$edit_users->name}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email"
                                                required placeholder="Enter Email"
                                                value="{{$edit_users->email}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone
                                            :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                required placeholder="Enter Phone Number"
                                                value="{{$edit_users->phone}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password :</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password"
                                                required placeholder="Enter Password"
                                                value="{{ $edit_users->password }}" />
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="city" class="col-sm-2 col-form-label">City :</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="city" class="form-control" name="city"
                                                value="{{$edit_users->city}}"
                                                placeholder="Enter City Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="state" class="col-sm-2 col-form-label">State :</label>
                                        <div class="col-sm-10">
                                            <input type="text" id="state" class="form-control" name="state"
                                                value="{{ $edit_users->state }}"
                                                placeholder="Enter State Name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="address" name="address"
                                                required placeholder="Enter Address"
                                                value="{{ $edit_users->address}}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pincode" class="col-sm-2 col-form-label">Pincode :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="pincode" name="pincode"
                                                required placeholder="Enter Pincode"
                                                value="{{ $edit_users->pincode }}" />
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row">
                                        <label for="profile_image" class="col-sm-2 col-form-label">Profile Image :</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" id="profile_image"
                                                name="profile_image" value="{{ $edit_users->profile_image }}" />

                                                <!-- Show the image box -->
                                                <img src="{{asset('storage/users/'.$edit_users->profile_image)}}" alt="image" width="50" height="50">
                                                
                                        </div>
                                    </div> --}}



                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 col-form-label">Status :</label>
                                        <div class="col-sm-10">
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="">Select</option>

                                                <option value="Active"{{ $edit_users->status == 'Active' ? 'selected' : ''}}> Active</option>

                                                <option value="InActive" {{ $edit_users->status == 'InActive' ? 'selected' : '' }}> InActive</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lang_1" class="col-sm-2 col-form-label">Language1 :</label>
                                        <div class="col-sm-10">
                                            <select name="lang_1" id="lang_1" class="form-control"  required>
                                                <option value="1">Hindi</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lang_2" class="col-sm-2 col-form-label">Language2 :</label>
                                        <div class="col-sm-10">
                                            <select  class="selectpicker  multiple form-control"
                                            data-max-options="1"  data-live-search="true" name="lang_2">
                                            @foreach ($language as $item)
                                            <option
                                                {{ isset($edit_users) ? ($edit_users->lang_2 == $item->id ? 'selected' : '') : '' }}
                                                value="{{ $item->id }}">{{ $item->language }}</option>
                                        
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lang_3" class="col-sm-2 col-form-label">Language3 :</label>
                                        <div class="col-sm-10">
                                            <select  class="selectpicker  multiple form-control"
                                            data-max-options="1"  data-live-search="true" name="lang_3">
                                                <option value="">select</option>
                                                @foreach ($language as $item)
                                            <option
                                                {{ isset($edit_users) ? ($edit_users->lang_3 == $item->id ? 'selected' : '') : '' }}
                                                value="{{ $item->id }}">{{ $item->language }}</option>
                                        
                                                @endforeach
                                            </select>
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
    <!-- Initialize the plugin: -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select').selectpicker();
        });
    </script>
@endsection
