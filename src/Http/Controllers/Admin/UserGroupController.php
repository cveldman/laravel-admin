<?php

namespace Veldman\Admin\Http\Controllers\Admin;

use Veldman\Admin\Http\Controllers\Controller;
use Veldman\Admin\Models\UserGroup;
use Veldman\Admin\Http\Requests\StoreUserGroupRequest;
use Veldman\Admin\Http\Requests\UpdateUserGroupRequest;

class UserGroupController extends Controller
{
    public function index()
    {
        $groups = UserGroup::all();

        return view('admin::admin.user-groups.index', compact('groups'));
    }

    public function create()
    {
        return view('admin::admin.user-groups.create');
    }

    public function store(StoreUserGroupRequest $request)
    {
        $userGroup = UserGroup::create($request->validated());

        return redirect()->route('admin.user-groups.show', $userGroup);
    }

    public function show(UserGroup $userGroup)
    {
        return view('admin::admin.user-groups.create', $userGroup);
    }

    public function edit(UserGroup $userGroup)
    {
        return view('admin::admin.user-groups.edit', $userGroup);
    }

    public function update(UpdateUserGroupRequest $request, UserGroup $userGroup)
    {
        $userGroup->update($request->validated());

        return redirect()->route('admin.user-groups.index');
    }

    public function destroy(UserGroup $userGroup)
    {
        return redirect()->route('admin.user-groups.index');
    }
}
