<?php

namespace Database\Factories;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Factories\Factory;

class DealFactory extends Factory
{
    protected $model = Deal::class;

    public function definition()
    {
        return [
            'deal_name' => $this->faker->words(3, true),
            'client_name' => $this->faker->name,
            'contact_number' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'date_approved' => $this->faker->optional()->date(),
            'production_due_date' => $this->faker->optional()->date(),
            'payment_method' => $this->faker->randomElement(['Cash', 'GCash', 'Cash_GCash']),
            'cash' => $this->faker->optional()->randomFloat(2, 100, 5000),
            'gcash' => $this->faker->optional()->randomFloat(2, 100, 5000),
            'cash_gcash' => $this->faker->optional()->randomFloat(2, 100, 5000),
            'date_closed' => $this->faker->optional()->date(),
            'grand_price' => $this->faker->randomFloat(2, 1000, 10000),
            'status' => $this->faker->randomElement(['Open', 'Processing', 'Closed', 'On-Hold', 'Cancelled']),
        ];
    }
}
