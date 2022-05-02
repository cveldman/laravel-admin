<?php

namespace Veldman\Admin\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Veldman\Admin\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class RoleFactory extends Factory
{
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->name()
        ];
    }
}
