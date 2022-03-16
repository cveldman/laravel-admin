<?php

namespace Veldman\Admin\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veldman\Admin\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function form()
    {
        return view('admin::login');
    }

    public function login(Request $request)
    {
        if(Auth::guard()->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect('/admin');
        }

        return redirect('/admin/login');
    }

    public function logout()
    {

    }
}
