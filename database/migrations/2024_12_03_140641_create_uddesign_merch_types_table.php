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
        Schema::create('uddesign_merch_types', function (Blueprint $table) {
            $table->id();
            $table->integer('merch_type_id'); // Unique integer identifier
            $table->integer('merch_category_id'); // Unique integer identifier
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uddesign_merch_types');
    }
};
