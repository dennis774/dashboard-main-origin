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
    Schema::table('deals', function (Blueprint $table) {
        // Remove the `items` column if it exists
        $table->dropColumn('items');
    });
}

public function down()
{
    Schema::table('deals', function (Blueprint $table) {
        // Recreate the `items` column if necessary (this is just in case you want to roll back the migration)
        $table->json('items')->nullable();
    });
}

};
