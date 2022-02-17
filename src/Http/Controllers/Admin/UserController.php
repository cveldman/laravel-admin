<?php

namespace Veldman\Admin\Http\Controllers\Admin;

use Veldman\Admin\Http\Controllers\Controller;
use Veldman\Admin\Http\Requests\StoreUserRequest;
use Veldman\Admin\Http\Requests\UpdateUserRequest;
use Veldman\Admin\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::search(['name', 'email'])
            ->paginate();

        return view('admin::admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin::admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        return view('admin::admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin::admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user = $user->update($request->validated());

        return redirect()->route('admin.customers.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back();
    }
}
