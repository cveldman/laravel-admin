<?php

namespace Veldman\Admin;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Veldman\Admin\Models\Permission;
use Veldman\Admin\Models\Role;

trait HasPermissions
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($roles): bool
    {
        foreach($this->roles as $role) {
            if($role->slug == $roles) {
                return true;
            }
        }

        return false;
    }

    public function hasPermission($permissions): bool
    {
        foreach($this->permissions as $permission) {
            if($permission->slug == $permissions) {
                return true;
            }
        }

        foreach($this->roles as $role) {
            foreach($role->permissions as $permission) {
                if($permission->slug == $permissions) {
                    return true;
                }
            }
        }

        return false;
    }
}