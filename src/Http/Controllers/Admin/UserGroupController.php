<?php

namespace Veldman\Admin\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        //
    }

    public function store(StoreUserGroupRequest $request)
    {
        //
    }

    public function show(UserGroup $userGroup)
    {
        //
    }

    public function edit(UserGroup $userGroup)
    {
        //
    }

    public function update(UpdateUserGroupRequest $request, UserGroup $userGroup)
    {
        //
    }

    public function destroy(UserGroup $userGroup)
    {
        //
    }
}
