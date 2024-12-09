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
            'deal_id' => Deal::factory(),
            'description' => $this->faker->sentence,
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->randomFloat(2, 50, 500),
            'total_price' => function (array $attributes) {
                return $attributes['quantity'] * $attributes['unit_price'];
            },
        ];
    }
}

