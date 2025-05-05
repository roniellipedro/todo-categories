<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        $user = User::all()->random();

        while (count($user->categories) == 0) {
            $user = User::all()->random();
        }

        return [
            'title' => $this->faker->text(30),
            'due_date' => $this->faker->dateTime(),
            'description' => $this->faker->text(100),
            'category_id' => $user->categories->random(),
            'user_id' => $user


        ];
    }
}
