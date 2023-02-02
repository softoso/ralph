<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>User Login</title>
    <style>
        html {
            font-size: 89%;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            width: 100%;
            background-color: rgb(167, 240, 234);
            min-height: 100vh;
        }

        form {
            min-width: 366px;
        }

        .card {
            box-shadow: 0px 0px 10px rgb(0, 0, 0, 0.5);
            outline: none;
            border: none;
        }

        .col-md-6 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            font-weight: 900;
        }

        .footer {
            font-weight: 900;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto ">
                    <div class="card-wrapper">
                        <div class="card-titles">
                            <h1 class="text-center my-5">eezyStudy</h1>
                        </div>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <div class="card-title">
                                    <h3 class="text-center">Create an Account 😍</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="msg">
                                    @if (Session::get('success'))
                                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                                    @endif
                                    @if (Session::get('fail'))
                                        <p class="alert alert-danger">{{ Session::get('fail') }}</p>
                                    @endif
                                </div>
                                <form method="post" action="{{ route('user.create') }}" autocomplete="off">
                                    @csrf
                                    <div class="form-group py-2">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            autofocus value="{{ old('name') }}">
                                        <span class="text-danger">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="email">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email') }}">
                                        <span class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            value="{{ old('password') }}">
                                        <span class="text-danger">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group py-2">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword"
                                            value="{{ old('cpassword') }}">
                                        <span class="text-danger">
                                            @error('cpassword')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="py-2 text-center"></div>
                                    <button type="submit" name="submit" class="btn btn-primary">Register</button>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <p><a href="{{ route('user.login') }}">Already have an account?</a></p>
                                <p><a href="{{ route('user.forgot') }}">Forgot Password?</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 footer">
                    <p class="text-center">❤️ Made in India ❤️</p>
                    <p class="text-center">Softoso Technologies</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>

</html>
