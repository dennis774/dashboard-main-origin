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
        Schema::create('kuwago_one_categories', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->integer('category_id'); // Unique integer identifier
            $table->string('name');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuwago_one_categories');
    }
};
