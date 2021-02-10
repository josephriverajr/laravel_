<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
      //  validate the form data
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
      // attemt to login returns true of false
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ], $request->remember)){
            // if success , redirect home
            return redirect()->intended(route('admin.dashboard')); // ito para maredirect sa last url / page si user
        }
        else{
            // else, balik sa login
            return redirect()->back()->withInpit($request->only('email','remember'));
        }
     
        
      
    }
}
