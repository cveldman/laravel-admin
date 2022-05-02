<?php

namespace Veldman\Admin\Http\Controllers\Admin;

use Veldman\Admin\Http\Controllers\Controller;
use Veldman\Admin\Http\Requests\UpdateProfileRequest;
use Veldman\Admin\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin::admin.profile.edit', ['profile' => auth()->user()]);
    }

    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->validated());

        return redirect('/admin');
    }
}
