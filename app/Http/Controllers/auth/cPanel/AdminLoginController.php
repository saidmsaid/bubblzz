<?php

namespace App\Http\Controllers\cPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('adminLogout');
    }

    public function showLoginForm () {
        return view('admin.admin-auth.admin-login');
    }

    public function login (Request $request) {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);
        if(Auth::guard('admin')->attempt(['username'=>$request->username, 'password'=> $request->password], $request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->withInput($request->only(['username', 'remember']))->with('error', 'Username Or Password Not Matched');
    }

    public function adminLogout () {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
