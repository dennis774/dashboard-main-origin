<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('deal_name');
            $table->string('client_name');
            $table->string('contact_number');
            $table->string('email')->nullable();
            $table->date('date_approved')->nullable();
            $table->date('production_due_date')->nullable();
            $table->enum('payment_method', ['Cash', 'GCash', 'Cash_GCash'])->nullable();
            $table->decimal('cash', 10, 2)->nullable();
            $table->decimal('gcash', 10, 2)->nullable();
            $table->decimal('cash_gcash', 10, 2)->nullable();
            $table->date('date_closed')->nullable();
            $table->json('items');  // For storing item details as JSON
            $table->decimal('grand_price', 10, 2);
            $table->enum('status', ['Open', 'Processing', 'Closed', 'On-Hold', 'Cancelled']);
            $table->timestamps();
        });
    }
    
    

    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
