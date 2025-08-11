<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
   public function up()
{
    Schema::create('orders', function (Blueprint $table) {
    $table->id();

    $table->string('paddy_id'); // storing paddy_id string like 'PD1'
    $table->unsignedBigInteger('stock_manager_id');
    $table->unsignedBigInteger('farmer_id');

    $table->string('product_name');
    $table->integer('quantity'); // in kg
    $table->decimal('price', 10, 2); // total price
    $table->string('payment_method');
    $table->string('status')->default('pending'); // make sure status is defined
    $table->text('rejection_reason')->nullable(); // no 'after'
    $table->text('cancellation_reason')->nullable();

    $table->timestamps();

    $table->foreign('stock_manager_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('farmer_id')->references('id')->on('users')->onDelete('cascade');
});
}

}