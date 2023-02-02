
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
        v
        body {
            font-family: 'Poppins', sans-serif;
        }

        .wrapper {
            width: 100%;
            background-color: rgb(167, 240, 234);
            min-height: 100vh;
        }

        form{
            min-width: 366px;
        }
        .card{
            box-shadow: 0px 0px 10px rgb(0, 0, 0,0.5);  
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
        .footer{
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
                                    <h3 class="text-center">Forgot Password?</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>We will send you a password reset link on your registered email adderess.</p>
                                <form method="post" action="{{route('user.login')}}" autocomplete="off">
                                    @csrf
                                    <div class="form-group py-2">
                                      <label for="email">Email address</label>
                                      <input type="email" class="form-control" name="email" id="email" autofocus>
                                    </div>
                                    
                                    <div class="py-2 text-center" ></div>
                                    <button type="submit" name="submit" class="btn btn-primary">Login</button>
                                  </form>
                            </div>
                            <div class="card-footer text-center">
                                
                                <p>or</p>
                                <p><a href="{{route('user.register')}}">Create a New Account</a></p>
                                <p><a href="{{route('user.login')}}">Already have an account</a></p>
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