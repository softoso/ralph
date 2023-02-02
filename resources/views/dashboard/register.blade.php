<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Softoso - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{url('')}}/assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{url('')}}/assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            @if (Session::get('success'))
                                <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @if (Session::get('fail'))
                                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                            @endif
                            <form class="user" method="post" action="{{ route('user.create') }}">
                                <div class="form-group row">
                                    @csrf
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name" value="{{old('first_name')}}">
                                        @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name" value="{{old('last_name')}}">
                                        @error('last_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="email" name="email"
                                        placeholder="Email Address" value="{{old('email')}}">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="password" placeholder="Password" value="{{old('password')}}">
                                            @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="cpassword" name="cpassword" placeholder="Repeat Password" value="{{old('cpassword')}}">
                                            @error('cpassword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" value="Register Account" >

                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ Route('user.forgot') }}">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ Route('user.login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{url('')}}/assets/backend/vendor/jquery/jquery.min.js"></script>
    <script src="{{url('')}}/assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('')}}/assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('')}}/assets/backend/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{url('')}}/assets/backend/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('')}}/assets/backend/js/demo/chart-area-demo.js"></script>
    <script src="{{url('')}}/assets/backend/js/demo/chart-pie-demo.js"></script>

</body>

</html>