<?php

namespace Database\Factories;

use App\Models\UddesignFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class UddesignFeedbackFactory extends Factory
{

    protected $model = UddesignFeedback::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'feedback_type' => $this->faker->randomElement(['Comment', 'Suggestion', 'Complaint']),
            'product_name' => $this->faker->randomElement(['Pizza', 'Burger', 'Pasta', 'Salad', 'Sushi']),
            'comments' => $this->faker->paragraph,
            'rating' => $this->faker->numberBetween(1, 5),
            'feedback_date' => $this->faker->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
