<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Promo::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'promo_image' => $this->faker->imageUrl(640, 480, 'business', true, 'Promo'),
            'start_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'sales_before' => $this->faker->randomFloat(2, 1000, 5000),
            'sales_after' => $this->faker->randomFloat(2, 500, 4500),
            'description' => $this->faker->paragraph(),
            'dishes_available' => json_encode($this->faker->words(5)),
        ];
    }
}