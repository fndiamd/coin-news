<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'adminLogout']);
        $this->middleware('guest:admin')->except('adminLogout');
        $this->middleware('guest:member')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login', ['title' => 'Login']);
    }

    public function username()
    {
        return 'user_email';
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::guard('member')->attempt([$this->username() => $request->email, 'password' => $request->password])) {
            return redirect('/');
        } else {
            return redirect('login')->with('error', 'Email or Password are incorrect.');
        }
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['admin_email' => $request->email, 'password' => $request->password])) {
            return redirect('/admin/dashboard');
        } else {
            return redirect('/admin/login')->with('error', 'Email or Password are incorrect.');
        }
    }

    public function adminLogout(Request $request)
    {
        if (Auth::guard('admin')->check()) // this means that the admin was logged in.
        {
            Auth::guard('admin')->logout();
            return redirect('admin/login');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    public function logout()
    {
        if (Auth::guard('member')->check()) // this means that the admin was logged in.
        {
            Auth::guard('member')->logout();
            return redirect('/');
        }

        $this->guard()->logout();
        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
