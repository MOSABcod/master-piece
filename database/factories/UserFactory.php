<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Classes; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Determine role randomly or specify via state
        $role = $this->faker->randomElement([0, 1]); // 0: Student, 1: Teacher

        return [
            'first_name'    => $this->faker->firstName, // Arabic first name
            'last_name'     => $this->faker->lastName,  // Arabic last name
            'username'      => $this->faker->unique()->userName,
            'password'      => Hash::make('password'), // Default password
            'email'         => $this->faker->unique()->safeEmail,
            'role'          => $role, // 0 or 1
            'age'           => $role === 0 ? $this->faker->numberBetween(6, 18) : null, // Applicable to students
            'class_id'      => $role === 0 ? Classes::inRandomOrder()->first()->id ?? Classes::factory() : Classes::inRandomOrder()->first()->id ?? Classes::factory(),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
