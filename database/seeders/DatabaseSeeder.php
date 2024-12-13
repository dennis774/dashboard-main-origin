<?php

namespace Database\Seeders;

use App\Models\Deal;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Promo;
use App\Models\DealItem;
use App\Models\FakeData;
use App\Models\Feedback;
use App\Models\TargetSales;
use App\Models\FakeDataThree;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use App\Models\BudgetAllocation;
use App\Models\UddesignFeedback;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // FakeData::factory()->Count(731)->create();
        // FakeDataThree::factory()->Count(1000)->create();
        // FakeDataTwo::factory()->Count(1000)->create();
        // Feedback::factory()->count(100)->create();
        // UddesignFeedback::factory()->count(100)->create();

        // Deal::factory(500)
        //     ->has(DealItem::factory()->count(rand(3, 5)), 'items')
        //     ->create();

        // Promo::factory(100)->create();

        $startDate = Carbon::create(2023, 1, 1);
        $endDate = Carbon::create(2024, 12, 31);

        while ($startDate <= $endDate) {
            // Generate TargetSales data for each day in the range
            TargetSales::factory()->create([
                'start_date' => $startDate->copy()->toDateString(),
                'end_date' => $startDate->copy()->addDays(1)->toDateString(),
            ]);

            // Generate BudgetAllocations data for each day in the range
            BudgetAllocation::factory()->create([
                'start_date' => $startDate->copy()->toDateString(),
                'end_date' => $startDate->copy()->addDays(1)->toDateString(),
            ]);

            // Move to the next day
            $startDate->addDay();
        }

    }
}
