<?php

namespace Veldman\Admin\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Veldman\Admin\Models\Permission;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PermissionFactory extends Factory
{
    protected $model = Permission::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name()
        ];
    }
}
