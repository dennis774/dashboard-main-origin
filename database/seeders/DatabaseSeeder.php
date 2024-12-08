<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FakeData;
use App\Models\FakeDataThree;
use App\Models\UddesignFeedback;
use Illuminate\Database\Seeder;
use App\Models\Feedback;


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
        UddesignFeedback::factory()->count(100)->create();

    }
}
