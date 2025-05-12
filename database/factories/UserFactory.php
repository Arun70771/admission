<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Default password is 'password'
            'remember_token' => \Str::random(10),
        ];
    }

    /**
     * Define a specific user.
     *
     * @return Factory
     */
    public function testUser()
    {
        return $this->state([
            'email' => 'test@example.com',
            'password' => Hash::make('password'), // Use Hash for security
        ]);
    }
}
