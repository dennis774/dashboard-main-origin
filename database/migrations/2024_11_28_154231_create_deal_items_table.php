<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('deal_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deal_id');  // Foreign key to the deals table
            $table->string('description');  // Item description
            $table->integer('quantity');  // Quantity of the item
            $table->decimal('unit_price', 10, 2);  // Price per unit
            $table->decimal('total_price', 10, 2);  // Total price for this item
            $table->timestamps();
    
            // Add the foreign key constraint
            $table->foreign('deal_id')->references('id')->on('deals')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deal_items');
    }
};
