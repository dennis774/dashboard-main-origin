<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('budget_allocations', function (Blueprint $table) {
            $table->id();
            $table->enum('business_type', ['UdDesign', 'Kuwago1', 'Kuwago2'])->nullable();  // No default value set here
            $table->decimal('amount', 10, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_displayed')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_allocations');
    }
};
