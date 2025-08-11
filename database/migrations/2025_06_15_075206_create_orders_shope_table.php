<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders_shope', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('paddy_id');

            $table->integer('quantity');
            $table->string('status')->default('pending'); // pending, approved
            $table->string('invoice_path')->nullable(); // Path to invoice PDF

            $table->timestamps();

            // Foreign Keys (optional if needed)
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('paddy_id')->references('id')->on('paddies')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
