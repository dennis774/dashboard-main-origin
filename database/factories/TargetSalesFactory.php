<?php

namespace Database\Factories;

use App\Models\TargetSales;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TargetSales>
 */
class TargetSalesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TargetSales::class;

    public function definition()
    {
        return [
            'business_type' => $this->faker->randomElement(['UdDesign', 'Kuwago1', 'Kuwago2']),
            'amount' => $this->faker->randomFloat(2, 1000, 10000), // amount between 1000 and 10000
            'start_date' => $this->faker->date('Y-m-d', '2024-01-01'),
            'end_date' => $this->faker->date('Y-m-d', '2024-12-31'),
        ];
    }
}
