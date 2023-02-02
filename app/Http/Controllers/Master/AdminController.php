<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin_dashboard.dashboard');
    }

    public function check(Request $request){
        $request->validate([
            'email' => 'required|exists:admins,email',
            'password' => 'required',
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('fail','Incorrect email or password');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
