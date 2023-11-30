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
        Schema::table('prodacts', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items')
                  ->constrained()
                  ->cascadeonUpdate()
                  ->cascadeonDelete();

            $table->foreign('customer_id')->references('id')->on('customers')
                  ->constrained()
                  ->cascadeonUpdate()
                  ->cascadeonDelete();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['item_id']);
        $table->dropForeign(['customer_id']);
    }
};
