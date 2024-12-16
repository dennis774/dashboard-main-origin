<?php

namespace Database\Factories;

use App\Models\BudgetAllocation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BudgetAllocation>
 */
class BudgetAllocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = BudgetAllocation::class;

    public function definition()
    {
        return [
            'business_type' => $this->faker->randomElement(['UdDesign', 'Kuwago1', 'Kuwago2']),
            'amount' => $this->faker->randomFloat(2, 500, 5000), // amount between 500 and 5000
            'start_date' => $this->faker->date('Y-m-d', '2024-01-01'),
            'end_date' => $this->faker->date('Y-m-d', '2024-12-31'),
        ];
    }
}
