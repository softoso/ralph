<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Psy\Util\Str;

use Carbon\Carbon;

class   UserController extends Controller
{
    /////////////// CREATING A NEW NORMAL USER TO THE APPLICATION///
    public function create(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|max:30|min:8',
            'cpassword' => 'required|same:password'
        ], [
            'cpassword.same' => 'Password does not matched',
        ]);

        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $full_name = $first_name . " " . $last_name;


        $user = new User();
        $user->name = $full_name; //Enter the full name here
        $user->email = $request->email; //Entering the email here
        $user->password = Hash::make($request->password); //Entering the password and making hash
        $save = $user->save();


        //Creating a Email 
        $last_id = $user->id;

        //Generating a 120CHAR Unique Code
        $token = $last_id . hash('sha256', \Str::random(120));

        //Creating a Verificatin URLS
        $verifyURL = route('user.verify', [
            'token' => $token,
            'service' => 'Email_verification'
        ]);

        //Entering the token number to verifyUser Table
        VerifyUser::create([
            'user_id' => $last_id,
            'token' => $token
        ]);

        //Writing the Messages for
        $message = 'Dear <b>' . $request->name . '<b>';
        $message .= 'This is a system generated email, to verify your account on EezyStudy. Please click on the below button to activate your account now.';

        //Setting UP mail data 
        $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => $request->email,
            'fromName' => $full_name,
            'subject' => 'Account Verification - EezyStudy',
            'body' => $message,
            'actionLink' => $verifyURL
        ];

        \Mail::send('verify_email', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });


        if ($save) {
            return redirect()->back()->with('success', 'You Need to verify your email, We have sent an activation link to your email. Please activate your account to login and continue');
        } else {
            return redirect()->back()->with('fail', 'Something went worng, failed to register');
        }
    }


    //////// VALIDATING THE NORMAL USER TO PERFORM LOGIN PROCESS //////////
    public function check(Request $request)
    {
        //validating fields
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30'
        ], [
            //Custom messages for errors
            'email.email' => 'Please enter a valid email',
            'email.exists' => 'This email is not registered yet',
            'password.min' => 'Password should be minimum 8 character long.'
        ]);

        //CHECKING THE CREDENTIALS AND MAKING HIM TO LOGIN WITH AUTH CLASS
        $creds = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($creds)) {
            return redirect()->route('user.home');
        } else {
            return redirect()->route('user.login')->with('fail', 'Incorrect Email or Password');
        }
    }

    //LOGOUT THE USER FROM THE USER DASHBOARD
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.login');
    }

    // RETURING THE USER TO DASHBOARD
    public function home()
    {
        return view('dashboard.dashboard');
    }


    // VERIFYING THE USER IS ACTIVE OR ACTIVATE USER FROM THE LINK
    public function verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->email_verified_status) {

                $verifyUser->user->email_verified_status = 1;
                $verifyUser->user->save();

                return redirect()->route('user.login')->with('success', 'You account is now active, Please login to continue')->with('verifiedEmail', $user->email);
            } else {
                return redirect()->route('user.login')->with('success', 'Email is already verified, You can now login')->with('verifiedEmail', $user->email);
            }
        }
    }

    //SENDING EMAIL TO USER WITH THIER PASSWORD CHANGING LINK
    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email|email',
        ], [
            'email.exists' => 'Your entered email does not exists, Please enter registered email to send link',
            'email.required' => 'Please enter Email to send link'
        ]);

        $token = \Str::random(60);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        $actionLink = route('user.resets', ['token' => $token, 'email' => $request->email]);
        $user_data = \DB::table('users')->where('email', $request->email)->first(); //Fetching Data from User Table       
        $name = $user_data->name;

        \Mail::send('reset', ['actionLink' => $actionLink, 'fromName' => $name], function ($message) use ($request, $name) {
            $message->from('EezyStudy@gmail.com', 'EezyStudy');
            $message->to($request->email, $name)
                ->subject('Change Password - EezyStudy');
        });

        return back()->with('success', 'We have sent password reset link to your email. Successfully');
    }



    //// SHOWING THE PASSWORD CHANGE FORM WITH USER EMAIL AND TOKEN
    public function showResetPasswordForm(Request $request)
    {

        $email = $request->email;
        $token = $request->token;
        if (!(($email == null) && ($token == null))) {
            return view('dashboard.change', compact('email', 'token'));
        } else {
            return view('errors.404');
        }
    }

    //// CHANGE PASSWORD REQUEST GOES HERE
    public function changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|max:30',
            'cpassword' => 'required|same:password'
        ],[
            'cpassword.same' => 'Entered passwords are not matched',
        ]);

        //Fetching the user from the user table and updating the password
        $user = User::where('email','=',$request->email)->first();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        //Deleting the token from the password_resets table 
        \DB::table('password_resets')->where('email', '=', $request->email)->delete();
        return redirect()->route('user.login')->with('success','Your password has been change, Please login');

    }   
}
