<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: rgb(222, 235, 247);
        }

        .mail_head {
            margin: 40px 0 0 0;
        }

        .mail_body,
        .mail_head {
            padding: 1rem;
        }

        h2 {
            font-size: 1.4rem;
            color: blue;
            font-weight: 600;
        }

        .title {
            font-size: 1.2rem;
            margin: 15px 0;
            font-weight: 600;
            color: purple;
        }

        .content {
            color: rgb(70, 70, 70);
        }

        .mail_footer p {
            color: #777;
            font-size: 0.8rem;
        }

        .radius {
            border-radius: 10px;
            box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.5);
        }
    </style>
    <title>Mail Templates</title>
</head>

<body>
    <div class="container">
        <div class="row" style="background: #fff">
            <div class="col-xs-12 col-sm-6 col-md-4 mx-auto mail_head bg-light radius">
                <h2 class="text-center" style="text-align: center">Account Verification</h2>
            </div>
        </div>
        <div class="row" style="background: #fff">

            <div class="col-xs-12 col-sm-6 col-md-4 mx-auto mail_body bg-light my-3 radius">
                <div class="title text-center" style="text-align: center">🎉🎉 Greetings 🎁🎁</div>
                <div class="content">
                    Dear <b>{!!$fromName!!}</b>
                    <br>
                    This is a system generated email, to verify your account on EezyStudy. Please click on the below
                    button to activate your account now.

                    <br>
                    <br>
                    Thank you,<br>
                    EezyStudy.com
                    <br><br>
                </div>
                <div class="link" style="text-align: center;">
                    <a href="{!! $actionLink !!}" class="btn btn-info" style="
                    text-align:center;
                    padding:5px 8px;
                    background-color:blue;
                    border:1px solid white;
                    color:white;
                    text-decoration:none;
                    ">Activate Now</a>
                </div>
                <hr>
                <div class="mail_footer text-center" style="text-align: center">
                    <p>All rights are reserved to Softoso Technologies</p>
                    <p>EezyStudy.com</p>
                    <p>{{ date('Y-m-d H:i:s')}}</p>
                </div>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>

</html>