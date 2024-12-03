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
        Schema::create('uddesign_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('feedback_type');
            $table->string('product_name');
            $table->text('comments');
            $table->integer('rating');
            $table->date('feedback_date'); // Add the date column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uddesign_feedback');
    }
};
