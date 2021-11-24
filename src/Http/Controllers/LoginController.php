<?php

namespace Veldman\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
