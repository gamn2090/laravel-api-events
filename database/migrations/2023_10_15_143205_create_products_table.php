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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                  ->references('id')->on('local')->onDelete('cascade');
            $table->string('name');
            $table->decimal('stock', 10,5);
            $table->decimal('price', 10,5);
            $table->string('unidad')->default('unidad');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
