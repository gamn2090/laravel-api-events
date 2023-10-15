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
        Schema::create('details', function (Blueprint $table) {
            $table->id();      
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                    ->references('id')->on('invoices')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
                    ->references('id')->on('products')->onDelete('cascade');
            $table->string('quantity');
            $table->decimal('price', 10,5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
