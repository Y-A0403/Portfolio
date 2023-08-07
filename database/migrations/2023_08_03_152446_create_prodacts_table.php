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
        Schema::create('prodacts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('customer');
            $table->integer('order_by')->default(null);
            $table->date('deadline');
            $table->string('manager');
            $table->boolean('is_selling')->default(true);
            $table->string('memo')->nullable();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodacts');
    }
};
