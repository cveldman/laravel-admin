<?php

namespace Veldman\Admin\Tests\Feature\Http\Controllers\Admin;

use Veldman\Admin\Models\User;
use Veldman\Admin\Tests\TestCase;

class UserControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());

        $this->user = User::factory()->create();
    }

    public function test_index()
    {
        $response = $this->get(route('admin.users.index'));

        $response->assertStatus(200);
    }

    public function test_create()
    {
        $response = $this->get(route('admin.users.create'));

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $data = [
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'roles' => [1]
        ];

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertValid()
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['name' => 'User']);

        $this->assertDatabaseHas('role_user', [
            'role_id' => 1,
            'user_id' => 1
        ]);
    }

    public function test_show()
    {
        $response = $this->get(route('admin.users.show', $this->user));

        $response->assertStatus(200);
    }

    public function test_edit()
    {
        $response = $this->get(route('admin.users.edit', $this->user));

        $response->assertStatus(200);
    }

    public function test_update()
    {
        $data = [
            'name' => 'User',
            'roles' => [1]
        ];

        $response = $this->put(route('admin.users.update', $this->user), $data);

        $response->assertValid()
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['name' => 'User']);

        $this->assertDatabaseHas('role_user', [
            'role_id' => 1,
            'user_id' => 1
        ]);
    }

    public function test_destroy()
    {
        $response = $this->delete(route('admin.users.destroy', $this->user));

        $response->assertRedirect();

        $this->assertDatabaseMissing('users', ['name' => $this->user->name]);
    }
}
