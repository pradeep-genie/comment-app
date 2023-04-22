<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Login | Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <style>
        body {
            background-image: url('{{ asset('assets/images/login_banner.jpeg') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center center;
        }
    </style>
</head>

<body>
    <div class="account-pages mt-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden border border-primary shadow mb-4">
                        <div style="background-color: #07133d">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white">Sign in to continue HotOTT (Mobile)</p>

                                    <center> 
                                        <a href="{{ route('admin.login') }}" >
                                            <img class="shadow mb-1" src="{{ asset('assets/images/logo.jpeg') }}" height="100" width="100" alt="logo">
                                        </a> 
                                    </center>
                            </div>
                        </div>

                        <div class="card-body p-4">

                            <div class="p-3">
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    {{ csrf_field() }}
                                    <input type="hidden" name="Platform_id" value="2">

                                    <div class="form-group">
                                        <label for="username" class="text-dark">Username</label>
                                        <input type="text" class="form-control" id="username" name="email"
                                            placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="text-dark">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter password">
                                    </div>

                                    <div class="form-group">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox"
                                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                name="remember">
                                            <span class="ml-2 text-sm text-dark">{{ __('Remember me') }}</span>
                                        </label>


                                        <div class="form-group text-center">
                                            <button class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 text-center text-dark">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> HOTOTT<span class="d-none d-sm-inline-block">
                                    - All Right Reserved.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
