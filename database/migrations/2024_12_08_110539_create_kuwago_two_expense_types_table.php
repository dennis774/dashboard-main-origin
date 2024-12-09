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
        Schema::create('kuwago_two_expense_types', function (Blueprint $table) {
            $table->id();
            $table->integer('expense_type_id'); // Unique integer identifier
            $table->integer('expense_category_id'); // Unique integer identifier
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuwago_two_expense_types');
    }
};
