<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> Xeloro - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets') }}/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block bg-white shadow-lg rounded my-5">
                            <div class="row">
                                <div class="col-lg-5 d-none d-lg-block bg-login rounded-left">

                                </div>
                                <div class="col-lg-7">
                                    <div class="p-5">
                                        <div class="text-center mb-5">
                                            <a href="{{ route('welcome') }}"
                                                class="text-dark font-size-22 font-family-secondary">
                                                <img src="{{ asset('assets/logo.png') }}" width="70" alt="">
                                                <b>Mutiara
                                                    Variasi</b>
                                            </a>
                                        </div>
                                        <h1 class="h5 mb-1">Welcome Back!</h1>
                                        <p class="text-muted mb-4">Enter your email address and password to access admin
                                            panel.</p>
                                        <form class="user" action="{{ route('login') }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="email" name="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    id="exampleInputEmail" placeholder="Email Address"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="exampleInputPassword" placeholder="Password">
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <button type="submit"
                                                class="btn btn-success btn-block waves-effect waves-light"> Log In
                                            </button>

                                        </form>

                                        <div class="row mt-4">
                                            <div class="col-12 text-center">
                                                {{-- <p class="text-muted mb-2"><a href="pages-recoverpw.html"
                                                        class="text-muted font-weight-medium ml-1">Forgot your
                                                        password?</a></p> --}}
                                                <p class="text-muted mb-0">Don't have an account? <a
                                                        href="{{ route('register') }}"
                                                        class="text-muted font-weight-medium ml-1"><b>Sign Up</b></a>
                                                </p>
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div> <!-- end .padding-5 -->
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/js/metismenu.min.js"></script>
    <script src="{{ asset('assets') }}/js/waves.js"></script>
    <script src="{{ asset('assets') }}/js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets') }}/js/theme.js"></script>

</body>

</html>
