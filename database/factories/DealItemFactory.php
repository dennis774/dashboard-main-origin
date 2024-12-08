<?php

namespace Database\Factories;

use App\Models\Deal;
use App\Models\DealItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class DealItemFactory extends Factory
{
    protected $model = DealItem::class;

    public function definition()
    {
        return [
            'deal_id' => Deal::factory(), // This will associate the deal item with a new deal
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->randomFloat(2, 50, 500),
            'total_price' => fn (array $attributes) => $attributes['quantity'] * $attributes['unit_price'],
        ];
    }
}
