@extends('layouts.backend.backend')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto" >
                <div class="card p-2">
                    <div class="card-image p-5">
                        <img src="{{url('/assets/backend/img')}}/logo.png" class="dashboard_logo" alt="">
                    </div>
                    <div class="msg_header">
                        <h1>Account Verification</h1>
                    </div>
                    <hr>
                    <div class="msg">
                        <p>Dear User, <br>
                            You should verify your account first please check your email and click on verify now button in mail.
                            
                        </p>
                        
                    </div>
                    <hr>
                    <div class="resend text-center">
                        <a href="" class="btn shadow-sm btn-primary">Resend Verification Link</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection