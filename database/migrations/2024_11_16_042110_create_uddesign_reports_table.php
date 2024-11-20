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
        Schema::create('uddesign_reports', function (Blueprint $table) {
            $table->id();
            $table->decimal('gcash', 10, 2)->nullable();
            $table->decimal('cash', 10, 2)->nullable();
            $table->decimal('print_sales', 10, 2);
            $table->decimal('merch_sales', 10, 2);
            $table->decimal('custom_sales', 10, 2);
            $table->decimal('total_sales', 10, 2);
            $table->decimal('print_expenses', 10, 2);
            $table->decimal('merch_expenses', 10, 2);
            $table->decimal('custom_expenses', 10, 2);
            $table->decimal('total_expenses', 10, 2);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uddesign_reports');
    }
};
