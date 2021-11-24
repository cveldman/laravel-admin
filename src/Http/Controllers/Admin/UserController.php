<?php

namespace Veldman\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Veldman\Admin\Models\User;
use Veldman\Admin\Http\Requests\StoreUserRequest;
use Veldman\Admin\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin::admin.users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(StoreUserRequest $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}
