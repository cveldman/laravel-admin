<?php

namespace Veldman\Admin\Http\Controllers\App;

use Illuminate\Http\Request;
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
        //
    }

    public function logout()
    {

    }
}
