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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('local_id');
            $table->foreign('local_id')
                  ->references('id')->on('local')->onDelete('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')
                ->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')
                    ->references('id')->on('clients')->onDelete('cascade');
            $table->decimal('total', 10,5);
            $table->decimal('subtotal',10,5);
            $table->decimal('taxes',50,30);
            $table->string('observation')->nullable();
            $table->dateTime('creation_date');
            $table->boolean('active')->default(true);
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
