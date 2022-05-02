<?php

namespace Veldman\Admin\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Veldman\Admin\Http\Controllers\Controller;
use Veldman\Admin\Http\Requests\StoreUserRequest;
use Veldman\Admin\Http\Requests\UpdateUserRequest;
use Veldman\Admin\Models\Permission;
use Veldman\Admin\Models\Role;

class UserController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model =  config('auth.providers.users.model');
    }

    public function index()
    {
        $this->authorize('viewAny', $this->model);

        $users = $this->model::paginate();

        return view('admin::admin.users.index', compact('users'));
    }

    public function create()
    {
        $this->authorize('create', $this->model);

        $roles = Role::pluck('name', 'id');
        $permissions = Permission::pluck('name', 'id');

        return view('admin::admin.users.create', compact('roles', 'permissions'));
    }

    public function store(StoreUserRequest $request)
    {
        $this->authorize('create', $this->model);

        $data = $request->validated();

        $user = $this->model::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->roles()->sync($request->get('roles'));
        $user->permissions()->sync($request->get('permissions'));

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        $user = $this->model::findOrFail($id);

        $this->authorize('view', $user);

        return view('admin::admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->model::findOrFail($id);

        $this->authorize('update', $user);

        $roles = Role::pluck('name', 'id');
        $permissions = Permission::pluck('name', 'id');

        return view('admin::admin.users.edit', compact('roles', 'permissions', 'user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->model::findOrFail($id);

        $this->authorize('update', $user);

        $user->update($request->validated());

        $user->roles()->sync($request->get('roles'));
        $user->permissions()->sync($request->get('permissions'));

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = $this->model::findOrFail($id);

        $this->authorize('delete', $user);

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
