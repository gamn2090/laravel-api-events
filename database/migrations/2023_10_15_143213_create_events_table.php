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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                  ->references('id')->on('local')->onDelete('cascade');
            $table->string('name');
            $table->string('artist');
            $table->longText('details');
            $table->integer('capacity');
            $table->string('image');
            $table->dateTime('date');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
