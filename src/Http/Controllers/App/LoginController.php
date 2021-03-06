<?php

namespace Veldman\Admin\Http\Controllers\App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Veldman\Admin\Http\Controllers\Controller;
use Veldman\Admin\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {

        return view('admin::app.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended('/admin');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended();
    }
}
