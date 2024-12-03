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
        Schema::create('kuwago_one_reports', function (Blueprint $table) {
            $table->id();
            $table->float('orders')->nullable();
            $table->float('cash')->nullable();
            $table->float('gcash')->nullable();
            $table->float('sales');
            $table->float('expenses')->nullable();
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuwago_one_reports');
    }
};
