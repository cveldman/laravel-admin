<?php

namespace Veldman\Admin\Tests\Feature\Models;

use Veldman\Admin\Models\Permission;
use Veldman\Admin\Models\Role;
use Veldman\Admin\Models\User;
use Veldman\Admin\Tests\TestCase;

class UserTest extends TestCase
{
    public function test_roles()
    {
        $user = User::factory()
            ->has(Role::factory(['name' => 'Admin', 'slug' => 'admin']))
            ->create();

        $this->assertCount(1, $user->roles);
    }

    public function test_has_roles()
    {
        $user = User::factory()
            ->has(Role::factory(['name' => 'Admin', 'slug' => 'admin']))
            ->create();

        $this->assertTrue($user->hasRole('admin'));
    }

    public function test_permissions()
    {
        $user = User::factory()
            ->has(Role::factory(['name' => 'Admin', 'slug' => 'admin']))
            ->create();

        $this->assertCount(0, $user->permissions);
    }

    public function test_has_permission()
    {
        $user = User::factory()
            ->has(Permission::factory(['name' => 'Admin', 'slug' => 'admin']))
            ->create();

        $this->assertTrue($user->hasPermission('admin'));
    }

    public function test_has_permission_through_role()
    {
        $user = User::factory()
            ->has(Role::factory()->has(Permission::factory(['name' => 'Admin', 'slug' => 'admin'])))
            ->create();

        $this->assertTrue($user->hasPermission('admin'));
    }
}
