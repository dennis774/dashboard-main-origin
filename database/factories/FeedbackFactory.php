<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Feedback;

class FeedbackFactory extends Factory
{
    protected $model = Feedback::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'feedback_type' => $this->faker->randomElement(['Comment', 'Suggestion', 'Complaint']),
            'dish' => $this->faker->randomElement(['Pizza', 'Burger', 'Pasta', 'Salad', 'Sushi']),
            'comments' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
            'feedback_date' => fake()->dateTimeBetween('2023-01-01', '2024-11-30')->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
