<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
        'name' => fake()->sentence(3),
        'description' => fake()->sentence(8),
        'is_complete' => fake()->boolean(),
        'user_id' => User::factory(),
        'company_id' => Company::factory(),
         ];
    }
}
